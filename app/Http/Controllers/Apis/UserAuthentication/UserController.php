<?php

namespace App\Http\Controllers\Apis\UserAuthentication;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiResponseTrait;
use App\Http\Controllers\Manage\BaseController;
use Tymon\JWTAuthExceptions\JWTException;
use Tymon\JWTAuth\Contracts\JWTSubject as JWTSubject;
use Validator,Auth,Artisan,Hash,File,Crypt;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserRole;
use App\Models\UserLocation;
use carbon\carbon;
use JWTFactory;
use JWTAuth;
use JWT;


class UserController extends Controller
{
    use ApiResponseTrait;


    public function User_Registration(Request $request){
        $created_at = carbon::now()->toDateTimeString();
        $dateTime = date('Y-m-d H:i:s',strtotime('+2 hours',strtotime($created_at)));
        
        $lang = "ar";
        $input = $request->all();

        $validationMessages = [
            'name.required' => $lang == 'ar' ? "من فضلك أدخل الاسم أسمك" : "firstname is required",
            'phone.required' => $lang == 'ar' ? 'من فضك ادخل رقم الهاتف' :"phone is required"  ,
            'phone.unique' => $lang == 'ar' ? 'رقم الهاتف موجود لدينا بالفعل' :"phone is already teken" ,
            'phone.min' => $lang == 'ar' ?  'رقم الهاتف يجب ان لا يقل عن 7 ارقام' :"The phone must be at least 7 numbers" ,
            "password.required" => $lang == 'ar' ? "من فضلك ادخل كلمه السر" : "Password is required",
            'password.confirmed' => $lang == 'ar' ? 'كلمتا السر غير متطابقتان' :"The password confirmation does not match",
            'password.min' => $lang == 'ar' ?  'كلمة السر يجب ان لا تقل عن 6 احرف' :"The password must be at least 6 character" ,       
            'email.required' => $lang == 'ar' ? 'من فضلك ادخل البريد الالكتروني' :"email is required"  ,
            'email.unique' => $lang == 'ar' ? 'هذا البريد الالكتروني موجود لدينا بالفعل' :"email is already token" ,
            'email.regex'=> $lang == 'ar'? 'من فضلك ادخل بريد الكتروني صالح' : 'The email must be a valid email address',
        ];
        $validator = Validator::make($input, [
            'name' => 'required',
            'phone' => 'required|unique:users|min:7',
            'password' => 'required|confirmed|min:6',
            'email' => 'unique:users|regex:/(.+)@(.+)\.(.+)/i',

        ], $validationMessages);

        if ($validator->fails()) {
            return $this->apiResponseMessage(0,$validator->messages()->first(), 200);
        }

        $add = new User;
        $add->name	= $request->name;
        $add->email = $request->email;
        $add->phone = $request->phone;
        $add->password = bcrypt($request->password);
        $add->image = $request->file('image') ? BaseController::saveImage("users" , $request->file('image')) : "img.png";
        $add->state	= "accept";
        $add->firebase_token = $request->firebase_token;
        $add->created_at = $dateTime;
        $add->save();

        $add_role = new UserRole;
        $add_role->type = 2;                 /// 1 :: admin  2 :: User  3 :: resturant   4 :: delivery
        $add_role->user_id = $add->id;
        $add_role->created_at = $dateTime;
        $add_role->save();  

        $token = JWTAuth::fromUser($add);

        $user = User::where('id' , $add->id)->first();
        $user['userToken'] = $token;

        return $this->apiResponseData(  UserResource::make($user) , "user data");
   
    }

    public function app_login (Request $request){

        $lang = "ar";
        $user = User::where([['phone',$request->email] ])
                    ->orwhere([['email' , $request->email] ])->first();
        if(is_null($user))
        {
            $msg = $lang=='ar' ?  'البيانات المدخلة غير موجودة لدينا ':'user not exist' ;
            return $this->apiResponseMessage( 0,$msg, 200);
        }
        $password = Hash::check($request->password,$user->password);
        if($password==true){

            if($request->firebase_token) {
                $user->firebase_token = $request->firebase_token;
            }
            $user->save();
            $token = JWTAuth::fromUser($user);
            $user['userToken'] = $token;

            $user_response = UserResource::make($user);

          
            
            $msg = $lang=='ar' ? 'تم تسجيل الدخول بنجاح':'Welcome, you are login successfull' ;

            return response()->json([ 'error'=> 1,'message'=> $msg, 'data'=> $user_response]);
        }
        $msg = $lang=='ar' ?  'كلمة السر غير صحيحة' : 'Password is not correct' ;
        return $this->apiResponseMessage( 0,$msg, 200);
    }

    
    public function show_userByID(Request $request){
        $lang = "ar";
        if(!auth()->User()){
            $msg = $lang == 'ar' ? " من فضلك سجل دخول" : "Token is not provided";

            return $this->apiResponseMessage( 3, $msg);
        }

        $data = User::where('id' , auth()->user()->id)->first();
    
        $user_response = UserResource::make($data);

         
        return $this->apiResponseData(  $user_response, "بيانات  المستخدم");

    }
    

    public function update_Profile(Request $request){
        $lang = "ar";
        if(!auth()->User()){
            $msg = $lang == 'ar' ? " من فضلك سجل دخول" : "Token is not provided";

            return $this->apiResponseMessage( 3, $msg);
        }

        $created_at = carbon::now()->toDateTimeString();
        $dateTime = date('Y-m-d H:i:s',strtotime('+2 hours',strtotime($created_at)));
       
       
        $check_email = User::where([['email' , $request->email] , ['id' , '!=' , auth()->User()->id]])->first();
        $check_phone = User::where([['phone' , $request->phone] , ['id' , '!=' , auth()->User()->id]])->first();

        if($check_email != null){
            return $this->apiResponseMessage( 0, "البريد الالكترونى موجود بالفعل");

        }
        
        if($check_phone != null){
            return $this->apiResponseMessage( 0, "رقم الهاتف موجود بالفعل");

        }
        
        
        $data = User::where('id' , auth()->User()->id)->first();

        $name =  $request->has('name') && $request->name != null ? $request->name : $data->name;
        $email =  $request->has('email') && $request->email != null ? $request->email : $data->email;
        $phone =  $request->has('phone') && $request->phone != null ? $request->phone : $data->phone;
        $image =   $request->file('image') ? BaseController::saveImage("users" , $request->file('image')) : $data->image;

        $update_city = User::where('id' , auth()->User()->id)->update([
                                                                    "name" => $name,
                                                                    "email" => $email,
                                                                    "phone" => $phone,
                                                                    "image" => $image,
                                                                    "updated_at" => $dateTime
                                                                    ]);

        $data = User::where('id' , auth()->User()->id)->first();

        return $this->apiResponseData(  UserResource::make($data),  "تم تعديل بياناتك بنجاح");
                                                                                                          
    }
    
    public function Auth_logout(Request $request){
        $lang = 'ar';

        if(auth()->User()){
            
            $delete_token  = User::where('id' , auth()->User()->id)->update(['firebase_token' => NULL]);
            Auth::guard('api')->logout();

            $msg = $lang == 'ar' ? " تم تسجيل الخروج بنجاح" : "Logout successfully";

            return $this->apiResponseMessage( 1, $msg);

        }else{

             $msg = $lang == 'ar' ? " من فضلك سجل دخول" : "Token is not provided";

            return $this->apiResponseMessage( 3, $msg);
        }
    }


    public function Social_Login(Request $request){
        
        $lang = "ar";
        $created_at = carbon::now()->toDateTimeString();
        $dateTime = date('Y-m-d H:i:s',strtotime('+2 hours',strtotime($created_at)));

        $check_user = User::where([['email' , $request->email] ])->first();
        
        if( $check_user != NULL){

            if($request->firebase_token) {
                $check_user->firebase_token = $request->firebase_token;
            }
            $check_user->save();
            $token = JWTAuth::fromUser($check_user);
            $check_user['userToken'] = $token;

            $msg = $lang == 'ar' ? 'مرحبآ بك, أنت لديك حساب بالفعل' : "Wellcome, you already have account";
            return $this->apiResponseData(  UserResource::make($check_user) , $msg);

        }else{

            $check_email = User::where([['email' , $request->email]])->first();
            $check_phone = User::where([['phone' , $request->phone]])->first();
    
            if($check_email != null){
                return $this->apiResponseMessage( 0, "البريد الالكترونى موجود بالفعل");
    
            }
            
            if($check_phone != null){
                return $this->apiResponseMessage( 0, "رقم الهاتف موجود بالفعل");
    
            }
            $add = new User;
            $add->name = $request->name;
            $add->email = $request->email;
            $add->phone = $request->phone;
            $add->state = "accept";
            $add->firebase_token = $request->firebase_token;
            $add->created_at = $dateTime;
            $add->save();
            
            
            $add_role = new UserRole;
            $add_role->type = 2;                 /// 1 :: admin  2 :: User  3 :: resturant   4 :: delivery
            $add_role->user_id = $add->id;
            $add_role->created_at = $dateTime;
            $add_role->save();  
    
            $token = JWTAuth::fromUser($add);
        
            $user = User::where('id' , $add->id)->first();
            $user['userToken'] = $token;


            $msg = $lang == 'ar' ? " تم أنشاء حساب جديد ,مرحبا بك فى تطبيق شوارعنا": "New Account is created, please complete the data";
            return $this->apiResponseData(  UserResource::make($user) , $msg);

        }

    }

    
    public function show_userLocations(Request $request){
        $lang = "ar";
        if(!auth()->User()){
            $msg = $lang == 'ar' ? " من فضلك سجل دخول" : "Token is not provided";

            return $this->apiResponseMessage( 3, $msg);
        }
        
        $data = UserLocation::Selection()->where('user_id', auth()->User()->id)->get();
        
        $msg = $lang == 'ar' ? "عناوين المستخدم": "All User Locations";
        return $this->apiResponseData( $data , $msg);

    }
    
    
    public function add_userLocation(Request $request){
        $lang = "ar";
        if(!auth()->User()){
            $msg = $lang == 'ar' ? " من فضلك سجل دخول" : "Token is not provided";

            return $this->apiResponseMessage( 3, $msg);
        }
        
        $created_at = carbon::now()->toDateTimeString();
        $dateTime = date('Y-m-d H:i:s',strtotime('+2 hours',strtotime($created_at)));
      
        $add =  new UserLocation();
        $add->name = $request->name;
        $add->address = $request->address;
        $add->Latitude = $request->Latitude;
        $add->Longitude = $request->Longitude;
        $add->floar_num = $request->floar_num;
        $add->Apartment_num = $request->Apartment_num;
        $add->details = $request->details;
        $add->user_id = auth()->user()->id;
        $add->created_at = $dateTime;
        $add->save();
        
        $msg = $lang == 'ar' ? " تم أضافه موقعك الجديد " : " A new location is inserted successfully";
        return $this->apiResponseMessage( 1, $msg);
        
    }
    
    
    public function delete_userLocation(Request $request){
        $lang = "ar";
        if(!auth()->User()){
            $msg = $lang == 'ar' ? " من فضلك سجل دخول" : "Token is not provided";

            return $this->apiResponseMessage( 3, $msg);
        }
        
        $data = UserLocation::where('id', $request->location_id)->first();
        
        $check = $this->not_found($data , 'العنوان', 'Location' , $lang);
        if( isset($check) ){
            return $check;
        }
     
        $deleteData = UserLocation::where('id', $request->location_id)->delete();

        $msg = $lang == 'ar' ? " تم إزاله الموقع بنجاح " : " Location is deleted Successfully";
        return $this->apiResponseMessage( 1, $msg);
    }
    
    
}
