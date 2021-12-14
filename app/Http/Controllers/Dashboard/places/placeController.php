<?php

namespace App\Http\Controllers\Dashboard\places;

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

class placeController extends Controller
{

    public function places_data(){

        $data = Place::Select()->get();

        $waiting_places = Place::Select()->where('state' , 'wait')->get();

        return view('dashboard.places.show', ['data' => $data, 'waiting_places' => $waiting_places]);
    }

    public function place_features(Request $request){

        $check = Place::where('id', $request->place_id )->first();
        if( $check->features == 1){
            $active = 0;
            $msg = "تم وضعه فى المميزه";

        }else{
            $active = 1;
            $msg = "تم إزالته من المميزه";
        }
        $updates = Place::where('id' , $request->place_id)->update(['features' => $active]);

        return redirect()->route('admin.places')->with('success' , $msg);
    }

    public function newPlace(){
        $user = User::select('id', 'name')->get();

        $category = Category::get();
        $City = City::all();

        return view('dashboard.places.Add_place', ['user' => $user, "category" => $category, 'City' => $City]);
    }

    public function get_SubCategory($categoryID){
        $data = SubCategory::select('name', 'id')->where('category_id', $categoryID)->get();
        return response()->json($data);
    }

    public function get_subCity($cityId){
        $data = SubCity::select('name', 'id')->where('city_id', $cityId)->get();

        return response()->json($data);
    }

    public function get_locations($subcityId){
        $data = Location::select('name', 'id')->where('subCity_id', $subcityId)->get();
        return response()->json($data);
    }


    public function add_place(PlaceRequest $request){
        $created_at = carbon::now()->toDateTimeString();
        $dateTime = date('Y-m-d H:i:s',strtotime('+2 hours',strtotime($created_at)));

        $input = $request->all();


        $check_role = UserRole::where([['type' , 3] , ['user_id' , $request->user_id]])->first();
        if( $check_role == null){
            $add_role = new UserRole;
            $add_role->type = 3;
            $add_role->user_id = $request->user_id;
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
        $add->latitude = "30.258"; //$request->latitude;
        $add->longitude = "30.258"; //$request->longitude;
        $add->price_range = $request->price_range;
        // $add->website = $request->website;
        $add->Facebook = $request->Facebook;
        $add->Twitter = $request->Twitter;
        $add->Instagram = $request->Instagram;
        $add->WhatsApp = $request->WhatsApp;
        $add->views = 0;
        $add->location_id = $request->location_id;
        $add->Category_id = $request->Category_id;
        $add->user_id = $request->user_id;
        $add->features = 0;
        $add->state = "accept";
        $add->created_at = $dateTime;
        $add->save();

        foreach ( $request->subCategory_ids as $subIds){

            $add_subcat = new PlaceCategory;
            $add_subcat->subcat_id = $subIds;
            $add_subcat->place_id = $add->id;
            $add_subcat->created_at = $dateTime;
            $add_subcat->save();
        }
        return redirect()->route('admin.places')->with('success' , "تم أضافه المطعم بنجاح");


    }


    public function PlaceDetails($place_id){
        $data = PlaceTime::Selection()->where('place_id', $place_id)->get();

        $place_name = Place::where('id', $place_id)->value('name_ar');

        $discounds = PlaceDiscount::Selection()->where('place_id' , $place_id)->get();

        $details = Place::Select()->where('places.id' , $place_id)->first();


        $gallary = PlaceGallary::Selection()->where('place_id', $place_id)->get();

        return view('dashboard.places.placeDetails', ['data' => $data, "place_id" => $place_id, 'place_name' => $place_name,
                                                      'discounds' => $discounds , 'details' => $details, 'gallary' => $gallary]);
    }

    public function add_newDay($place_id, Request $request){
        $created_at = carbon::now()->toDateTimeString();
        $dateTime = date('Y-m-d H:i:s',strtotime('+2 hours',strtotime($created_at)));

        if($request->day == null || $request->timeFrom ==  null || $request->timeTo == null){
            return redirect()->route('admin.place.details',$place_id)->with('error' , "من فضلك أدخل جميع البيانات");
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

        return redirect()->route('admin.place.details', $place_id)->with('success' , "تم أضافه مواعيد عمل للمطعم بنجاح");
    }

    public function destroy_Day( $day_id){

        $place_id = PlaceTime::where('id' , $day_id)->value('place_id');
        $deleteDay = PlaceTime::where('id', $day_id)->delete();
        return redirect()->route('admin.place.details', $place_id)->with('success' , "تم مسح المعاد بنجاح");

    }

    public function Accept_place($place_id){

        $updateData = Place::where('id' , $place_id)->update(['state' => 'accept']);

        return redirect()->route('admin.places')->with('success' , "تم قبول المحل بنجاح");
    }

    public function Add_Copouns($place_id, Request $request){
        $created_at = carbon::now()->toDateTimeString();
        $dateTime = date('Y-m-d H:i:s',strtotime('+2 hours',strtotime($created_at)));

        if($request->title == null || $request->text ==  null || $request->code == null ||$request->expired_date ==  null || $request->old_price == null){
            return redirect()->route('admin.place.details',$place_id)->with('error' , "من فضلك أدخل جميع البيانات الكوبون");
        }

        $add =  new PlaceDiscount;
        $add->title = $request->title;
        $add->text = $request->text;
        $add->code = $request->code;
        $add->expired_date = $request->expired_date;
        $add->old_price = $request->old_price;
        $add->new_price = $request->new_price;
        $add->used = 0;
        $add->place_id = $place_id;
        $add->created_at = $dateTime;
        $add->save();

        return redirect()->route('admin.place.details',$place_id)->with('success' , "تم أضافة كوبون جديد");

    }

    public function destroy_Copoun( $copounID){

        $place_id = PlaceDiscount::where('id' , $copounID)->value('place_id');
        $deleteDay = PlaceDiscount::where('id', $copounID)->delete();
        return redirect()->route('admin.place.details', $place_id)->with('success' , "تم مسح الكوبون بنجاح");

    }

    public function update_Video($place_id , Request $request){

        $created_at = carbon::now()->toDateTimeString();
        $dateTime = date('Y-m-d H:i:s',strtotime('+2 hours',strtotime($created_at)));

        $data = Place::selection()->where('places.id',  $place_id)->first();

        $updatePlce = Place::where('places.id' , $place_id)->update([
            "video" => $request->file('video') ? BaseController::saveImage("places" , $request->file('video')) : $data->video,
            "360image" => $request->image360 ?  $request->image360 : $data->image360,
            "updated_at" => $dateTime,
        ]);

        return redirect()->route('admin.place.details', $place_id)->with('success' , "تم تعديل بيانات المحل");

    }

    public function Add_GallaryImages($place_id, Request $request){
        $created_at = carbon::now()->toDateTimeString();
        $dateTime = date('Y-m-d H:i:s',strtotime('+2 hours',strtotime($created_at)));

        if($request->uploads == null || $request->uploads ==  "" ){
            return redirect()->route('admin.place.details',$place_id)->with('error' , "من فضلك أختر الصور أولا");
        }

        if ($request->hasfile('uploads')) {
            $all_images = $request->file('uploads');

            foreach($all_images as $image) {
                $imageName = BaseController::saveImage("places" , $image);

                $add =  new PlaceGallary;
                $add->place_id = $place_id;
                $add->uploads = $imageName;
                $add->type = $image->getClientOriginalExtension();
                $add->created_at = $dateTime;
                $add->save();

            }
        }

        return redirect()->route('admin.place.details',$place_id)->with('success' , "تم أضافة صور جديد");

    }

    public function destroy_Image( $imageID){

        $place_id = PlaceGallary::where('id' , $imageID)->value('place_id');
        $deleteDay = PlaceGallary::where('id', $imageID)->delete();
        return redirect()->route('admin.place.details', $place_id)->with('success' , "تم مسح الصوره بنجاح");

    }
}
