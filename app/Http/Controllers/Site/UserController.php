<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Tymon\JWTAuthExceptions\JWTException;
use Tymon\JWTAuth\Contracts\JWTSubject as JWTSubject;
use Validator,Auth,Artisan,Hash,File,Crypt;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\User;
use App\Models\SubCity;
use App\Models\UserRole;
use App\Models\AboutUs;
use App\Models\Place;
use carbon\carbon;
use JWTFactory;
use JWTAuth;
use JWT;
use App\Models\City;
use App\Models\OrdersProducts;
use App\Models\OrdersCoupons;
use App\Models\PlaceTime;
use App\Models\PlaceGallary;
use App\Models\Order_don;
use App\Models\Product;





class UserController extends Controller
{

    public function homePage(){


        $all_category = Category::Selection()->get();

        $about_data =  AboutUs::first();
        if(Auth::user() != NULL){
            $order_count = OrdersProducts::select()
            ->where('user_id',Auth::user()->id)->where('order_don',0)->get();

            $orders_coupons  = OrdersCoupons::select()
                ->join('place_discounts','place_discounts.id','=','orders_coupons.discounts_id')
                ->join('users','users.id','=','orders_coupons.user_id')
                ->select('orders_coupons.*','users.id as user_id','place_discounts.text','place_discounts.title','place_discounts.image',
                'place_discounts.code','place_discounts.old_price','place_discounts.new_price','place_discounts.expired_date')
                ->where('user_id',Auth::user()->id)->get();

            $count_orders= count($order_count)+count($orders_coupons);

            return view('website.Home.index', ['count_orders'=>$count_orders,'all_category' => $all_category , "about_data" => $about_data]);

        }

        return view('website.Home.index', ['all_category' => $all_category , "about_data" => $about_data]);
    }

    public function Site_login(Request $request){

        $remember_me = $request->has('remember_me') ? true : false;
        if( $request->email == null || $request->password ==  null){
            return redirect()->back()->with(['error'=> ' من فضلك أدخل البريد الالكترونى او كلمه السر']);
        }
        if(Auth()->guard('web')->attempt(['email' => $request->input('email') , 'password' => $request->input('password')]) ){
            return redirect()->route('get.site')->with(['success' => auth()->user()->name .' ,مرحبا ']);
        }
        return redirect()->back()->with(['error'=> 'خطأ فى البريد الالكترونى او كلمه السر']);

    }

    public function Site_register(Request $request){
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
            return redirect()->back()->with(['error'=> $validator->messages()->first()]);
        }

        $add = new User;
        $add->name	= $request->name;
        $add->email = $request->email;
        $add->phone = $request->phone;
        $add->password = bcrypt($request->password);
        $add->image =  "img.png";
        $add->state	= "accept";
        // $add->firebase_token = $request->firebase_token;
        $add->created_at = $dateTime;
        $add->save();

        $add_role = new UserRole;
        $add_role->type = 2;                 /// 1 :: admin  2 :: User  3 :: resturant   4 :: delivery
        $add_role->user_id = $add->id;
        $add_role->created_at = $dateTime;
        $add_role->save();

        if(Auth()->guard('web')->attempt(['email' => $request->input('email') , 'password' => $request->input('password')]) ){
            return redirect()->route('get.site')->with(['success' => auth()->user()->name .' ,مرحبا ']);
        }

    }


    public function profile_dash(){

        $all_category = Category::Select()->get();

        $about_data =  AboutUs::first();

        $myPlaces = Place::Select()->where('user_id' , Auth::User()->id)->Paginate(3);

        $data = PlaceTime::Selection()->get();

        $PlaceGallary = PlaceGallary::Selection()->get();

        // dd(Auth::user()->id);
        $product = Product::Select()->get();


        $order_don = Order_don::select()
        ->join('orders_products','orders_products.id','=','orders_don.order_id')
        ->select('orders_don.*','orders_products.quantity','orders_products.place_id')->get();



        return view("website.profile.places.index", ['order_don'=>$order_don,'product'=>$product,'PlaceGallary'=>$PlaceGallary,'data'=>$data,'all_category' => $all_category , "about_data" => $about_data, "myPlaces" => $myPlaces]);
    }





    public function my_profile(){
        $all_category = Category::Select()->get();
        $about_data =  AboutUs::first();
        $City = City::all();
        $SubCity  = SubCity::all();
        $userDetails = User::select()->where('id',Auth::user()->id)->get();

        return view('website.profile.myprofile.index',['userDetails'=>$userDetails,'City'=>$City,'SubCity'=>$SubCity,'all_category'=>$all_category,'about_data'=>$about_data]);
    }

    public function update_myProfile(Request $request){
        $created_at = carbon::now()->toDateTimeString();
        $dateTime = date('Y-m-d H:i:s',strtotime('+2 hours',strtotime($created_at)));

        $all_category = Category::Select()->get();
        $about_data =  AboutUs::first();
        $City = City::all();
        $SubCity  = SubCity::all();
        $userDetails = User::select()->where('id',Auth::user()->id)->get();

        $validationMessages = [
            'name.required' =>  "من فضلك أدخل الاسم أسمك" ,
            'phone.required' => 'من فضك ادخل رقم الهاتف'  ,
            'phone.unique' =>'رقم الهاتف موجود لدينا بالفعل' ,
            'phone.min' =>'رقم الهاتف يجب ان لا يقل عن 7 ارقام'  ,
            'email.required' => 'من فضلك ادخل البريد الالكتروني'  ,
            'email.unique' =>'هذا البريد الالكتروني موجود لدينا بالفعل',
            'email.regex'=> 'من فضلك ادخل بريد الكتروني صالح' ,
            'image.image' => 'تأكد من نوع الملف الذي تقوم برفعه يجب ان يكون صوره',
            'image.mimes' => '( png , jpg , jpeg )تأكد من نوع الملف الذي تقوم برفعه يجب ان يكون صوره',
        ];

        if($request->email == Auth::user()->email){
            $validator = Validator::make($request->all(), [
                'email' => '',
            ], $validationMessages);
        }else{
            $validator = Validator::make($request->all(), [
                'email' => 'required|unique:users|regex:/(.+)@(.+)\.(.+)/i',
            ], $validationMessages);
        }
        if($request->phone == Auth::user()->phone){
            $validator = Validator::make($request->all(), [
                'phone' => '',
            ], $validationMessages);
        }else{
            $validator = Validator::make($request->all(), [
                'phone' => 'required|unique:users|min:7',
            ], $validationMessages);
        }


        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'subCity' => '',
            'address'=> '',
            'image' => 'image|mimes:png,jpg,jpeg',

        ], $validationMessages);



        if ($validator->fails()) {
            return redirect()->back()->with(['error'=> $validator->messages()->first()]);
        }else{
            $id_updete = User::findorfail(Auth::user()->id);
            if($request->hasFile('image')){
                file::delete('uploads/users/'.$id_updete->image);
                $img = $request->file('image');
                $extension = $img->extension();
                $newName= uniqid('',true).'.'.$extension;
                $path = 'uploads/users';
                $final = $img->move($path,$newName);
                $request->image = $newName;
            }else{
                $request->image = $id_updete->image;
            }



            $result = User::where('id' , Auth::user()->id)->update([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'subCity_id' => $request->subCity,
                'address' => $request->address,
                'image' => $request->image,
            ]);
        }

        if($result){
            session()->flash('success','تم تحدث البيانات بنجاح');
        }else{
            session()->flash('error','هناك خطأ ما , يرجي المحاوله مره اخري!');
        }


        return redirect()->route('myprofile')->with(['userDetails'=>$userDetails,'City'=>$City,'SubCity'=>$SubCity,'all_category'=>$all_category,'about_data'=>$about_data]);
    }





    public function my_wallet(){
        $all_category = Category::Select()->get();
        $about_data =  AboutUs::first();
        $City = City::all();
        $SubCity  = SubCity::all();
        $userDetails = User::select()->where('id',Auth::user()->id)->get();
        // $user = User::first();
        // $user->balance; // 0


        // $user->deposit(10);
        // $user->balance; // 10

        // $user->withdraw(1);
        // $user->balance; // 9

        // dd($user->balance);
        // $user->forceWithdraw(200, ['description' => 'payment of taxes']);
        // // -191
        $user = user::findOrFail(Auth::user()->id);

        $user_balance = $user->balance;

        return view('website.profile.mywallet.index',['user_balance'=>$user_balance,'userDetails'=>$userDetails,'City'=>$City,'SubCity'=>$SubCity,'all_category'=>$all_category,'about_data'=>$about_data]);
    }


}
