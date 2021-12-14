<?php

namespace App\Http\Controllers\Apis\places;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiResponseTrait;
use App\Http\Controllers\Manage\BaseController;
use Validator,Auth,Artisan,Hash,File,Crypt;
use App\Http\Requests\PlaceRequest;
use App\Http\Resources\PlaceResources;
use App\Http\Resources\PlaceDetailsResources;
use App\Http\Resources\CityLocationsResources;
use Illuminate\Http\Request;
use carbon\carbon;
use App\Models\Place;
use App\Models\PlaceCategory;
use App\Models\City;
use App\Models\PlaceTime;
use App\Models\UserRole;
use App\Models\PlaceGallary;

class placesController extends Controller
{
    
    use ApiResponseTrait;

    public function Add_place(Request $request){
        $lang = "ar";
        if(!auth()->User()){
            $msg = $lang == 'ar' ? " من فضلك سجل دخول" : "Token is not provided";

            return $this->apiResponseMessage( 3, $msg);
        }
        $created_at = carbon::now()->toDateTimeString();
        $dateTime = date('Y-m-d H:i:s',strtotime('+2 hours',strtotime($created_at)));
       
        $input = $request->all();

        $validationMessages = [
            'logo.required' => 'اللوجو مطلوب',
            'cover.required' => 'صوره الخلفيه مطلوبه',
            'description.required' => 'وصف المحل مطلوب',
            'phone.required' => 'من فضك ادخل رقم الهاتف' ,
            'phone.min' =>   'رقم الهاتف يجب ان لا يقل عن 7 ارقام' ,
            'email.required' =>  'من فضلك ادخل البريد الالكتروني'  ,
            'email.regex'=>  'من فضلك ادخل بريد الكتروني صالح' ,
            'address.required' => 'العنوان مطلوب',
            'price_range.required' => 'من فضلك ادخل اسعار المحل تتراوح بين كام لى كام',
            'location_id.required' => 'من فضلك أختر عنوان المحل',
            'Category_id.required' => 'من فضلك أختر  أقسام المحل',
        ];
        $validator = Validator::make($input, [
            'logo' => 'required',
            'cover' => 'required',
            'description' => 'required',
            'phone' => 'required|min:7',
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i',
            'address' => 'required',
            'price_range' => 'required',
            'location_id' => 'required',
            'Category_id' => 'required',

        ], $validationMessages);

        if ($validator->fails()) {
            return $this->apiResponseMessage(0,$validator->messages()->first(), 200);
        }

        $check_role = UserRole::where([['type' , 3] , ['user_id' , auth()->User()->id]])->first();
        if( $check_role == null){
            $add_role = new UserRole;
            $add_role->type = 3;
            $add_role->user_id = auth()->User()->id;
            $add_role->created_at = $dateTime;
            $add_role->save();
        }

        $add = new Place;
        $add->name_ar = $request->name_ar;
        $add->name_en = $request->name_en;
        $add->logo = $request->file('logo') ? BaseController::saveImage("places" , $request->file('logo')) : "img.png";
        $add->cover = $request->file('cover') ? BaseController::saveImage("places" , $request->file('cover')) : "img.png";
        $add->description = $request->description;
        $add->phone = $request->phone;
        $add->email = $request->email;
        $add->address = $request->address;
        $add->latitude = $request->latitude;
        $add->longitude = $request->longitude;
        $add->price_range = $request->price_range;
        $add->website = $request->website;
        $add->Facebook = $request->Facebook;
        $add->Twitter = $request->Twitter;
        $add->Instagram = $request->Instagram;
        $add->WhatsApp = $request->WhatsApp;
        $add->views = 0;
        $add->location_id = $request->location_id;
        $add->Category_id = $request->Category_id;
        $add->user_id = auth()->User()->id;
        $add->features = 0;
        $add->state = "wait";
        $add->created_at = $dateTime;
        $add->save();

        foreach (explode(',', $request->subCategory_ids) as $subIds){

            $add_subcat = new PlaceCategory;
            $add_subcat->subcat_id = $subIds;
            $add_subcat->place_id = $add->id;
            $add_subcat->created_at = $dateTime;
            $add_subcat->save();
        }

        return $this->apiResponseData( Place::selection()->where('places.id', $add->id)->first(),"تم أضافة المطعم بنجاح" ); 
    }

    public function city_area_location(){
        
        $all_city = City::Selection()->get();

        return $this->apiResponseData( CityLocationsResources::collection($all_city) ,"جميع المحافظات و المناطق و الشوارع" ); 
    }

    
    public function myPlaces(Request $request){
    
        $lang = "ar";
        if(!auth()->User()){
            $msg = $lang == 'ar' ? " من فضلك سجل دخول" : "Token is not provided";

            return $this->apiResponseMessage( 3, $msg);
        }
        
        $data = Place::selection()->where('user_id', auth()->User()->id)->get();

        return $this->apiResponseData( PlaceResources::collection($data) ,"بيانات محلاتى" ); 
    }

    
    public function show_place_ById(Request $request){
        $lang = "ar";
        if(!auth()->User()){
            $msg = $lang == 'ar' ? " من فضلك سجل دخول" : "Token is not provided";

            return $this->apiResponseMessage( 3, $msg);
        }

        $data = Place::selection()->where('places.id', $request->place_id)->first();

        return $this->apiResponseData( PlaceResources::make($data) ,"بيانات المحل" ); 
    }


    public function update_place(Request $request){
        $lang = "ar";
        if(!auth()->User()){
            $msg = $lang == 'ar' ? " من فضلك سجل دخول" : "Token is not provided";

            return $this->apiResponseMessage( 3, $msg);
        }  
        $created_at = carbon::now()->toDateTimeString();
        $dateTime = date('Y-m-d H:i:s',strtotime('+2 hours',strtotime($created_at)));
       

        $data = Place::selection()->where('places.id', $request->place_id)->first();

        $name_ar = $request->has('name_ar') &&  $request->name_ar != null ? $request->name_ar : $data->name_ar;
        $name_en = $request->has('name_en') &&  $request->name_en != null ? $request->name_en : $data->name_en;
        $description = $request->has('description') &&  $request->description != null ? $request->description : $data->description;
        $phone = $request->has('phone') &&  $request->phone != null ? $request->phone : $data->phone;
        $email = $request->has('email') &&  $request->email != null ? $request->email : $data->email;
        $address = $request->has('address') &&  $request->address != null ? $request->address : $data->address;
        $price_range = $request->has('price_range') &&  $request->price_range != null ? $request->price_range : $data->price_range;
        $website = $request->has('website') &&  $request->website != null ? $request->website : $data->website;
        $Facebook = $request->has('Facebook') &&  $request->Facebook != null ? $request->Facebook : $data->Facebook;
        $Twitter = $request->has('Twitter') &&  $request->Twitter != null ? $request->Twitter : $data->Twitter;
        $Instagram = $request->has('Instagram') &&  $request->Instagram != null ? $request->Instagram : $data->Instagram;
        $WhatsApp = $request->has('WhatsApp') &&  $request->WhatsApp != null ? $request->WhatsApp : $data->WhatsApp;
        $location_id = $request->has('location_id') &&  $request->location_id != null ? $request->location_id : $data->location_id;
        $logo =   $request->file('logo') ? BaseController::saveImage("places" , $request->file('logo')) : $data->logo;
        $cover =   $request->file('cover') ? BaseController::saveImage("places" , $request->file('cover')) : $data->cover;

        $update_PlaceData = Place::where('id' , $request->place_id)->update([
                                                                                "name_ar" => $name_ar,
                                                                                "name_en" => $name_en,
                                                                                "description" => $description,
                                                                                "phone" => $phone,
                                                                                "email" => $email,
                                                                                "address" => $address,
                                                                                "price_range" => $price_range,
                                                                                "website" => $website,
                                                                                "Facebook" => $Facebook,
                                                                                "Twitter" => $Twitter,
                                                                                "Instagram" => $Instagram,
                                                                                "WhatsApp" => $WhatsApp,
                                                                                "location_id" => $location_id,
                                                                                "logo" => $logo,
                                                                                "cover" => $cover,
                                                                                "updated_at" => $dateTime,
                                                                            ]);

        $newdata = Place::selection()->where('places.id', $request->place_id)->first();

        return $this->apiResponseData( PlaceResources::make($newdata) ,"تم تعديل بيانات المحل بنجاح" ); 
                                                                    
                                                                            
    }

    public function add_placeTime(Request $request){
        $lang = "ar";
        if(!auth()->User()){
            $msg = $lang == 'ar' ? " من فضلك سجل دخول" : "Token is not provided";

            return $this->apiResponseMessage( 3, $msg);
        }
        $created_at = carbon::now()->toDateTimeString();
        $dateTime = date('Y-m-d H:i:s',strtotime('+2 hours',strtotime($created_at)));
       
        $input = $request->all();

        $check_time = PlaceTime::where('place_id', $request->place_id)->first();

        if($check_time != null){
            $deletePlaceTime = PlaceTime::where('place_id',  $request->place_id)->delete();
            $msg = $lang == 'ar' ? " تم تعديل مواعيد العمل لديك" : "place Time is updated Successfully ";
        }else{
            $msg = $lang == 'ar' ? " تم أضافة مواعيد العمل لديك" : "place Time is inserted Successfully ";
        }

        foreach( $input['days'] as $dd){

            if($dd['date'] == 1){
                $date_en = "Saturday";
                $date_ar = "السبت";
            }elseif($dd['date'] == 2){
                $date_en = "Sunday";
                $date_ar = "الحد";
            }elseif($dd['date'] == 3){
                $date_en = "Monday";
                $date_ar = "الأثنين";
            }elseif($dd['date'] == 4){
                $date_en = "Tuesday";
                $date_ar = "الثلاثاء";
            }elseif($dd['date'] == 5){
                $date_en = "Wednesday";
                $date_ar = "الأربعاء";
            }elseif($dd['date'] == 6){
                $date_en = "Thursday";
                $date_ar = "الخميس";
            }elseif($dd['date'] == 7){
                $date_en = "Friday";
                $date_ar = "الجمعة";
            }

            $add =  new PlaceTime;
            $add->date_en = $date_en ;
            $add->date_ar = $date_ar;
            $add->date_id = $dd['date'];
            $add->timeFrom = $dd['timeFrom'];
            $add->timeTo = $dd['timeTo'];
            $add->place_id = $request->place_id ;
            $add->created_at = $dateTime;
            $add->save();
        }

        return $this->apiResponseMessage( 0, $msg);
    }

    public function show_WorkingDays_ByPlaceId(Request $request){
        $lang = "ar";
        if(!auth()->User()){
            $msg = $lang == 'ar' ? " من فضلك سجل دخول" : "Token is not provided";

            return $this->apiResponseMessage( 3, $msg);
        }

        $data = PlaceTime::Selection()->where('place_id',  $request->place_id)->get();

        return $this->apiResponseData( $data ,"مواعيد العمل المحل" ); 
    }

    public function show_placeTime_ById(Request $request){
        
        $lang = "ar";
        if(!auth()->User()){
            $msg = $lang == 'ar' ? " من فضلك سجل دخول" : "Token is not provided";

            return $this->apiResponseMessage( 3, $msg);
        }

        $data = PlaceTime::Selection()->where('id',  $request->day_id)->first();

        return $this->apiResponseData( $data ,"مواعيد العمل" ); 
    }

    public function update_placeTime(Request  $request){
         
        $lang = "ar";
        if(!auth()->User()){
            $msg = $lang == 'ar' ? " من فضلك سجل دخول" : "Token is not provided";

            return $this->apiResponseMessage( 3, $msg);
        }
        $created_at = carbon::now()->toDateTimeString();
        $dateTime = date('Y-m-d H:i:s',strtotime('+2 hours',strtotime($created_at)));
        $data = PlaceTime::Selection()->where('id',  $request->day_id)->first();

        $date_en = $request->day != null ? $request->date_en : $data->date_en;
        $date_ar = $request->day != null ? $request->date_ar : $data->date_ar;
        $timeFrom = $request->has('timeFrom') &&  $request->timeFrom != null ? $request->timeFrom : $data->timeFrom;
        $timeTo = $request->has('timeTo') &&  $request->timeTo != null ? $request->timeTo : $data->timeTo;
        
        if($request->day == 1){
            $date_en = "Saturday";
            $date_ar = "السبت";
        }elseif($request->day == 2){
            $date_en = "Sunday";
            $date_ar = "الحد";
        }elseif($request->day == 3){
            $date_en = "Monday";
            $date_ar = "الأثنين";
        }elseif($request->day == 4){
            $date_en = "Tuesday";
            $date_ar = "الثلاثاء";
        }elseif($request->day == 5){
            $date_en = "Wednesday";
            $date_ar = "الأربعاء";
        }elseif($request->day == 6){
            $date_en = "Thursday";
            $date_ar = "الخميس";
        }elseif($request->day == 7){
            $date_en = "Friday";
            $date_ar = "الجمعة";
        }
        
        $updateData = PlaceTime::where('id',  $request->day_id)->update([
                                                                            "date_en" => $date_en,
                                                                            "date_ar" => $date_ar,
                                                                            "timeFrom" => $timeFrom,
                                                                            "timeTo" => $timeTo,
                                                                            "updated_at" => $dateTime,
                                                                        ]);
        $msg = $lang == 'ar' ? " تم تعديل مواعيد العمل" : "place Time is updated successfully ";
        return $this->apiResponseMessage( 0, $msg);
                                                                                        
    }

    public function place_ById(Request $request){
         
        $lang = "ar";
        if(!auth()->User()){
            $msg = $lang == 'ar' ? " من فضلك سجل دخول" : "Token is not provided";

            return $this->apiResponseMessage( 3, $msg);
        }
        $data = Place::Selection()->where('places.id',  $request->place_id)->first();

        return $this->apiResponseData( PlaceDetailsResources::make($data) ,"جميع تفاصيل المحل" ); 
    }

    public function place_extraDetails(Request $request){
        
        $lang = "ar";
        if(!auth()->User()){
            $msg = $lang == 'ar' ? " من فضلك سجل دخول" : "Token is not provided";

            return $this->apiResponseMessage( 3, $msg);
        }
        $created_at = carbon::now()->toDateTimeString();
        $dateTime = date('Y-m-d H:i:s',strtotime('+2 hours',strtotime($created_at)));
        
        $update_video = Place::where('id', $request->place_id)->update([
            "video" => $request->file('video') ? BaseController::saveImage("places" , $request->file('video')) : $data->video,
            "updated_at" => $dateTime
        ]);

        if($request->images == null || $request->images ==  "" ){
            return $this->apiResponseMessage( 2 , "من فضلك أختر الصور أولا");
        }

        if ($request->hasfile('images')) {
            $all_images = $request->file('images');

            foreach($all_images as $image) {
                $imageName = BaseController::saveImage("places" , $image);

                $add =  new PlaceGallary;
                $add->place_id = $request->place_id;
                $add->uploads = $imageName;
                $add->type = $image->getClientOriginalExtension();
                $add->created_at = $dateTime;
                $add->save();

            }
        }

        $data = Place::Selection()->where('places.id', $request->place_id)->first();
        return $this->apiResponseData( PlaceDetailsResources::make($data) ,"جميع تفاصيل المحل" ); 

    }

    public function destroy_Image( Request $request){
        $lang = 'ar';
        $deleteDay = PlaceGallary::where('id', $request->image_id)->delete();
        $msg = $lang == 'ar' ? " تم مسح الصوره بنجاح" : "image is deleted succesfully ";
        return $this->apiResponseMessage( 0, $msg);

    }
}

