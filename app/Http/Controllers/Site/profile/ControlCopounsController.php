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

class ControlCopounsController extends Controller
{
    public function show($id)
    {
        $all_category = Category::get();
        $about_data = AboutUs::first();
        $MyCopouns = PlaceDiscount::where('place_id','=',$id)->Paginate(5);

        return view('website.profile.copouns.index',['MyCopouns'=>$MyCopouns,'all_category'=>$all_category,'about_data'=>$about_data]);

    }

    public function create()
    {
        $all_category = Category::get();
        $about_data = AboutUs::first();
        $all_places = Place::where('user_id','=',Auth::User()->id)->get();


        return view('website.profile.copouns.create',['all_places'=>$all_places,'all_category'=>$all_category,'about_data'=>$about_data]);

    }


    public function add_place_discounts(Request $request){
        $created_at = carbon::now()->toDateTimeString();
        $dateTime = date('Y-m-d H:i:s',strtotime('+2 hours',strtotime($created_at)));

        $place_id = $request->place_id;

        $validated = $request->validate([
            'title' => 'required|max:100',
            'text' => 'required|max:100',
            'code' => 'required',
            'expired_date' => 'required',
            'old_price' => 'required',
            'new_price' => 'required',
            'place_id' => 'required',
            'image'=> 'image|mimes:png,jpg,jpeg,gif',
        ]);

        $add =  new PlaceDiscount;
        $add->title = $request->title;
        $add->text = $request->text;
        $add->code = $request->code;
        $add->image = $request->file('image') ? BaseController::saveImage("places" , $request->file('image')) : "img.png";
        $add->expired_date = $request->expired_date;
        $add->old_price = $request->old_price;
        $add->new_price = $request->new_price;
        $add->used = 0;
        $add->place_id = $place_id;
        $add->created_at = $dateTime;
        $add->save();
        if($add->save()){
            return redirect()->route('user.Formcoupons.add')->with('success' , "تم أضافة كوبون جديد");
        }else{
            return redirect()->route('user.Formcoupons.add')->with('erorr' , "هناك خطأ ما يرجي المحاوله مره اخري!");
        }

    }

    public function editeCopouns($id){
        $user = User::select('id', 'name')->get();
        $category = Category::get();
        $all_category = Category::Selection()->get();
        $about_data =  AboutUs::first();
        $City = City::all();
        $all_places = Place::Select()->where('user_id',Auth::user()->id)->get();
        $MyCopouns = PlaceDiscount::Select()->where('id','=',$id)->get();

        return view('website.profile.copouns.editeCopouns', ['MyCopouns'=>$MyCopouns,'all_category' => $all_category ,"about_data" => $about_data, "all_places" => $all_places,'user' => $user, "category" => $category, 'City' => $City]);
    }



    public function Update_copoun($id,Request $request){

        $user = User::select('id', 'name')->get();
        $category = Category::get();
        $all_category = Category::Selection()->get();
        $about_data =  AboutUs::first();
        $City = City::all();
        $all_places = Place::Select()->where('user_id',Auth::user()->id)->get();
        $MyCopouns = PlaceDiscount::Select()->where('id','=',$id)->get();

        $update_at = carbon::now()->toDateTimeString();
        $dateTime = date('Y-m-d H:i:s',strtotime('+2 hours',strtotime($update_at)));


        $validated = $request->validate([
            'title' => 'required|max:100',
            'text' => 'required|max:100',
            'code' => 'required|max:20',
            'expired_date' => 'required',
            'old_price' => 'required',
            'new_price' => 'required',
            'place_id' => 'required',
            'image'=> 'image|mimes:png,jpg,jpeg,gif',
        ]);



        $id_updete = PlaceDiscount::findorfail($id);

        if($request->hasFile('image')){
            file::delete('uploads/places/'.$id_updete->image);
            $img = $request->file('image');
            $extension = $img->extension();
            $newName= uniqid('',true).'.'.$extension;
            $path = 'uploads/places';
            $final = $img->move($path,$newName);
            $validate['image'] = $newName;
        }else{
            $validate['image'] = $id_updete->image;
        }



        $dataUpdate = PlaceDiscount::where('id',$id)->update([
            'title' => $request->title,
            'text' => $request->text,
            'code'    => $request->code,
            'expired_date' => $request->expired_date,
            'old_price' => $request->old_price,
            'new_price' => $request->new_price,
            'image' => $validate['image'],
            'place_id'=>$request->place_id,
            'updated_at' => $dateTime,
        ]);

        if($dataUpdate){
            session()->flash('success','تعم التعديل بنجاح');
        }else{
            session()->flash('error','هناك خطأ ما , يرجي المحاوله مره اخري!');
        }
        return redirect(url('editeCopouns/'.$id))->with(['MyCopouns'=>$MyCopouns,'all_category' => $all_category ,"about_data" => $about_data, "all_places" => $all_places,'user' => $user, "category" => $category, 'City' => $City]);

    }


    public function destroy($place_id , $id)
    {
        $all_category = Category::Select()->get();
            $about_data =  AboutUs::first();
            $myPlaces = Place::Select()->where('places.user_id' , Auth::user()->id)->paginate(3);



        $result = PlaceDiscount::where('id', $id)->delete();

        if($result){

            session()->flash('success','تعم الحذف بنجاح');
            return redirect(url('user-coupouns/'.$place_id))->with(['all_category' => $all_category , "about_data" => $about_data, "myPlaces" => $myPlaces]);
        }else{
            session()->flash('error','هناك خطأ ما , يرجي المحاوله مره اخري!');
            return  redirect()->back()->with(['all_category' => $all_category , "about_data" => $about_data, "myPlaces" => $myPlaces]);
        }
    }

}
