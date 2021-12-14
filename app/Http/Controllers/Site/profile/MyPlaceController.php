<?php

namespace App\Http\Controllers\Site\profile;
use Illuminate\Support\Facades\file;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PlaceRequest;
use App\Http\Controllers\Manage\BaseController;
use carbon\carbon;
use App\Models\Place;
use App\Models\User;
use App\Models\PlaceCategory;
use App\Models\City;
use App\Models\PlaceTime;
use App\Models\UserRole;
use App\Models\Category;
use App\Models\SubCity;
use App\Models\Location;
use App\Models\SubCategory;
use App\Models\PlaceDiscount;
use App\Models\PlaceGallary;
use App\Models\AboutUs;
use Auth;

class MyPlaceController extends Controller
{
    public function form_place(){
        $user = User::select('id', 'name')->get();

        $all_category = Category::get();
        $City = City::all();
        $about_data = AboutUs::first();


        return view('website.profile.places.add_place',['user' => $user, "all_category" => $all_category , 'City' => $City,'about_data'=>$about_data]);
    }


    public function add_place(Request $request){
        $created_at = carbon::now()->toDateTimeString();
        $dateTime = date('Y-m-d H:i:s',strtotime('+2 hours',strtotime($created_at)));

        $input = $request->all();


        $validate = $request->validate([
            'name_ar'=> 'required|string',
            'name_en'=>'',
            'phone'=> 'required|min:13|numeric',
            'WhatsApp'=>'required|min:11|numeric',
            'email'=>'required|email|',
            'description'=>'required|min:50',
            'address' => 'required',
            'price_range' => 'required|numeric',
            'Category_id'=> 'required|numeric|exists:category,id',
            'Facebook' => 'required',
            'Twitter' => '',
            'Instagram'=> '',
            'City' => 'required|numeric|exists:city,id',
            'subCity' => 'required',
            'location_id' => '',
            'user_id' => 'required|numeric',

            'logo'=> 'image|mimes:png,jpg,jpeg,gif',
            'cover'=> 'image|mimes:png,jpg,jpeg,gif',
        ]);

        // dd('');



        $add = new Place;
        $add->name_ar = $request->name_ar;
        $add->name_en = $request->name_en;
        $add->logo = $request->file('logo') ? BaseController::saveImage("places" , $request->file('logo')) : "img.png";
        $add->cover = $request->file('cover') ? BaseController::saveImage("places" , $request->file('cover')) : "img.png";
        $add->description = $request->description;
        $add->phone = $request->phone;
        $add->email = $request->email;
        $add->address = $request->address;
        $add->latitude = "30.258"; //$request->latitude;
        $add->longitude = "30.258"; //$request->longitude;
        $add->price_range = $request->price_range;
        $add->website = $request->website;
        $add->Facebook = $request->Facebook;
        $add->Twitter = $request->Twitter;
        $add->Instagram = $request->Instagram;
        $add->WhatsApp = $request->WhatsApp;
        $add->views = 0;
        $add->location_id = $request->location_id;
        $add->Category_id = $request->Category_id;
        $add->user_id = $request->user_id;
        $add->features = 0;
        $add->state = "wait";
        $add->created_at = $dateTime;
        $add->save();

        $i =0;
        foreach( $request->file('images') as $img){
            $i++;
            if($i >10){
                break;
            }
            $Images =  new PlaceGallary;
            $Images->uploads = $img ? BaseController::saveImage("places" , $img) : "img.png";
            $Images->place_id = $add->id;
            $Images->type='image';
            $Images->save();


        }


        foreach ( $request->subCategory_ids as $subIds){

            $add_subcat = new PlaceCategory;
            $add_subcat->subcat_id = $subIds;
            $add_subcat->place_id = $add->id;
            $add_subcat->created_at = $dateTime;
            $add_subcat->save();
        }

        if($add->save()){
         return redirect(url('profileDashboard'))->with('success' , "تم أضافه المطعم بنجاح");

        }else{
            return redirect(url('profileDashboard'))->with('erorr' , "هناك خطأ ما يرجي المحاولة");
        }


    }




    public function editePlace($id){

        $user = User::select('id', 'name')->get();

        $category = Category::get();



        $all_category = Category::Selection()->get();
        $about_data =  AboutUs::first();

        $City     = City::all();
        $SubCity  = SubCity::all();
        $Location = Location::all();

        $myPlaces = Place::Select()->where('id',$id)->get();

        $places_images = PlaceGallary::Select()->where('place_id',$id)->get();


        $subcategory = SubCategory::where('category_id',$myPlaces[0]->Category_id)->get();

        $location = Location::where('id',$myPlaces[0]->location_id)->get();
        $subCity = SubCity::where('id',$location[0]->subCity_id)->get();
        $city = City::where('id',$subCity[0]->city_id)->get();


        // dd($city);

        return view('website.profile.places.editePlace', ['places_images'=>$places_images,'Location'=>$Location,'SubCity'=>$SubCity,'city'=>$city,'subCity'=>$subCity,'location'=>$location,'subcategory'=> $subcategory,'all_category' => $all_category ,"about_data" => $about_data, "myPlaces" => $myPlaces,'user' => $user, "category" => $category, 'City' => $City]);
    }

    public function Update_place(Request $request, $id){

        $update_at = carbon::now()->toDateTimeString();
        $dateTime = date('Y-m-d H:i:s',strtotime('+2 hours',strtotime($update_at)));


        $validate = $request->validate([
            'name_ar'=> 'required|string',
            'name_en'=>'',
            'phone'=> 'required|min:11|numeric',
            'WhatsApp'=>'required|min:11|numeric',
            'email'=>'required|email|',
            'description'=>'required|min:50',
            'website' => ['regex:/^((?:https?\:\/\/|www\.)(?:[-a-z0-9]+\.)*[-a-z0-9]+.*)$/'],
            'address' => 'required',
            'price_range' => 'required|numeric',
            'Category_id'=> 'required|numeric|exists:category,id',
            'subCategory_ids' => 'required|numeric|exists:subcategory,id',
            'Facebook' => 'required',
            'Twitter' => '',
            'Instagram'=> '',
            'City' => 'required|numeric|exists:city,id',
            'subCity' => 'required',
            'location_id' => '',
            'user_id' => 'required|numeric',

            'logo'=> 'image|mimes:png,jpg,jpeg,gif',
            'cover'=> 'image|mimes:png,jpg,jpeg,gif',
        ]);

        $id_updete = Place::findorfail($id);
        if($request->hasFile('logo')){
            file::delete('uploads/places/'.$id_updete->logo);
            $img = $request->file('logo');
            $extension = $img->extension();
            $newName= uniqid('',true).'.'.$extension;
            $path = 'uploads/places';
            $final = $img->move($path,$newName);
            $validate['logo'] = $newName;
        }else{
            $validate['logo'] = $id_updete->logo;
        }
        if($request->hasFile('cover')){
            file::delete('uploads/places/'.$id_updete->cover);
            $img = $request->file('cover');
            $extension = $img->extension();
            $newName= uniqid('',true).'.'.$extension;
            $path = 'uploads/places';
            $final = $img->move($path,$newName);
            $validate['cover'] = $newName;
        }else{
            $validate['cover'] = $id_updete->cover;
        }

        $dataUpdate = Place::where('id',$id)->update([
            'name_ar' => $validate['name_ar'],
            'name_en' => $validate['name_en'],
            'logo'    => $validate['logo'],
            'cover'   => $validate['cover'],
            'description' => $validate['description'],
            'phone' => $validate['phone'],
            'email' => $validate['email'],
            'address' => $validate['address'],
            'latitude' => "30.258",
            'longitude'=> "30.258",
            'price_range'=> $validate['price_range'],
            'website' => $validate['website'],
            'Facebook' => $validate['Facebook'],
            'Twitter' => $validate['Twitter'],
            'Instagram' => $validate['Instagram'],
            'WhatsApp' => $validate['WhatsApp'],
            'video' => '',
            '360Image' => '',
            'location_id' => $validate['location_id'],
            'Category_id' => $validate['Category_id'],
            'user_id' => $validate['user_id'],
            'updated_at' => $dateTime,
        ]);

        if($dataUpdate){
            session()->flash('success','تعم التعديل بنجاح');
        }else{
            session()->flash('error','هناك خطأ ما , يرجي المحاوله مره اخري!');
        }
        return redirect(url('profileDashboard'));

    }

    public function destroy($id)
    {
        $all_category = Category::Select()->get();
        $about_data =  AboutUs::first();
        $myPlaces = Place::Select()->where('places.user_id' , Auth::user()->id)->paginate(3);


        // $data = PlaceDiscount::where('place_id', $id)->delete();
        // $place_id = PlaceTime::where('id' , $id)->value('place_id');
        // $deleteDay = PlaceTime::where('id', $id)->delete();
        // $deleteDay = PlaceGallary::where('id', $id)->delete();

        // $result = Place::where('id', $id)->delete();

        $result = Place::where('id' , $id)->update(['state' => 'wait']);

        if($result){

            session()->flash('success','تم إلغاء نشاط المحل بنجاح');
            return redirect(url('profileDashboard'))->with(['all_category' => $all_category , "about_data" => $about_data, "myPlaces" => $myPlaces]);
        }else{
            session()->flash('error','هناك خطأ ما , يرجي المحاوله مره اخري!');
            return  redirect()->back()->with(['all_category' => $all_category , "about_data" => $about_data, "myPlaces" => $myPlaces]);
        }
    }


    public function add_newDay($place_id, Request $request){
        $created_at = carbon::now()->toDateTimeString();
        $dateTime = date('Y-m-d H:i:s',strtotime('+2 hours',strtotime($created_at)));

        if($request->day == null || $request->timeFrom ==  null || $request->timeTo == null){
            return redirect()->route('site.profile.dash')->with('error' , "من فضلك أدخل جميع البيانات");
        }

        if($request->day == "1"){
            $date_en = "Saturday";
            $date_ar = "السبت";
        }elseif($request->day == "2"){
            $date_en = "Sunday";
            $date_ar = "الحد";
        }elseif($request->day == "3"){
            $date_en = "Monday";
            $date_ar = "الأثنين";
        }elseif($request->day == "4"){
            $date_en = "Tuesday";
            $date_ar = "الثلاثاء";
        }elseif($request->day == "5"){
            $date_en = "Wednesday";
            $date_ar = "الأربعاء";
        }elseif($request->day == "6"){
            $date_en = "Thursday";
            $date_ar = "الخميس";
        }elseif($request->day == "7"){
            $date_en = "Friday";
            $date_ar = "الجمعة";
        }


        $add =  new PlaceTime;
        $add->date_ar = $date_ar;
        $add->date_en = $date_en;
        $add->date_id = $request->day;
        $add->timeFrom = $request->timeFrom;
        $add->timeTo = $request->timeTo;
        $add->place_id = $place_id;
        $add->created_at = $dateTime;
        $add->save();

        return redirect()->route('site.profile.dash')->with('success' , "تم أضافه مواعيد عمل للمطعم بنجاح");
    }


    public function destroy_Day( $day_id){

        $place_id = PlaceTime::where('id' , $day_id)->value('place_id');
        $deleteDay = PlaceTime::where('id', $day_id)->delete();
        return redirect()->route('site.profile.dash')->with('success' , "تم مسح المعاد بنجاح");

    }

    public function destroy_Image( $imageID){

        $id_Del = PlaceGallary::findorfail($imageID);

       file::delete(url('uploads/places/'.$id_Del->uploads));

        $place_id = PlaceGallary::where('id' , $imageID)->value('place_id');
        $deleteImg = PlaceGallary::where('id', $imageID)->delete();

        return redirect(url('profileDashboard#placeImg-modal'.$place_id))->with('success' , "تم مسح الصوره بنجاح");

    }



    public function Add_GallaryImages($place_id, Request $request){
        $created_at = carbon::now()->toDateTimeString();
        $dateTime = date('Y-m-d H:i:s',strtotime('+2 hours',strtotime($created_at)));

        if($request->uploads == null || $request->uploads ==  "" ){
            return redirect(url('profileDashboard#placeImg-modal'.$place_id))->with('error' , "من فضلك أختر الصور أولا");
        }

        $all_Img_Place = PlaceGallary::where('place_id',$place_id)->get();



        if ($request->hasfile('uploads')) {
            $all_images = $request->file('uploads');

            $i=count($all_Img_Place);
            foreach($all_images as $image) {
                $i++;
                if($i >10){
                    break;
                }
                $imageName = BaseController::saveImage("places" , $image);

                $add =  new PlaceGallary;
                $add->place_id = $place_id;
                $add->uploads = $imageName;
                $add->type = $image->getClientOriginalExtension();
                $add->created_at = $dateTime;
                $add->save();

            }
        }

        return redirect(url('profileDashboard#placeImg-modal'.$place_id))->with('success' , "تم أضافة صور جديد");

    }




}
