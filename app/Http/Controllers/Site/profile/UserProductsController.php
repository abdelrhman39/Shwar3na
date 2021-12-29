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
use App\Models\PlaceTags;
use App\Models\Product;
use App\Models\ProductImages;
use App\Models\OrdersProducts;
use App\Models\OrdersCoupons;
use App\Models\Order_don;
use Auth;



class UserProductsController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data_products = Product::Select()
        ->join('places' , 'places.id','=','products.place_id')
        ->select('products.*','places.id as place_id_as','places.user_id','places.name_ar','places.logo')
        ->where('places.user_id',Auth::user()->id)->paginate(5);

        $all_category = Category::Selection()->get();
        $about_data = AboutUs::first();

        // $user = User::first();
        // $user->balance; // 0


        // $user->deposit(10);
        // $user->balance; // 10

        // $user->withdraw(1);
        // $user->balance; // 9

        // dd($user->balance);
        // $user->forceWithdraw(200, ['description' => 'payment of taxes']);
        // // -191




        return view('website.profile.products.index', ['data_products' => $data_products,'all_category' => $all_category,'about_data' =>  $about_data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $all_category = Category::get();
        $about_data = AboutUs::first();
        $all_places = Place::where('user_id','=',Auth::User()->id)->get();


        return view('website.profile.products.create',['all_places'=>$all_places,'all_category'=>$all_category,'about_data'=>$about_data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add_product(Request $request)
    {

        $all_category = Category::get();
        $about_data = AboutUs::first();
        $all_places = Place::where('user_id','=',Auth::User()->id)->get();



    $created_at = carbon::now()->toDateTimeString();
    $dateTime = date('Y-m-d H:i:s',strtotime('+2 hours',strtotime($created_at)));


    $validated = $request->validate([
        'name' => 'required|max:20',
        'description' => 'required|max:200',
        'old_price' => 'required|numeric',
        'new_price' => 'nullable|numeric|max:'.($request['old_price']-1),
        'place_id' => 'required',
        'Equip'=> 'required',
        'main_image'=> 'required|image|mimes:png,jpg,jpeg,gif',
    ]);

    $place_id = $request->place_id;

    // dd('');

        $add =  new Product;
        $add->name = $request->name;
        $add->description = $request->description;
        $add->old_price = $request->old_price;
        $add->new_price = $request->new_price;
        $add->main_image = $request->file('main_image') ? BaseController::saveImage("products" , $request->file('main_image')) : "img.png";
        $add->place_id = $place_id;
        $add->rate = 2;
        $add->Equip = $request->Equip;
        $add->is_active = 0;
        $add->created_at = $dateTime;
        $add->save();

        // dd($request->file('images'));

        $i =0;
        foreach( $request->file('images') as $img){
            $i++;
            if($i >6){
                break;
            }
            $Images =  new ProductImages;
            $Images->image = $img ? BaseController::saveImage("products" , $img) : "img.png";
            $Images->product_id = $add->id;
            $Images->save();
        }




        if($add->save()){
            session()->flash('success','تم الاضافه بنجاح');
        }else{
            session()->flash('error','هناك خطأ ما , يرجي المحاوله مره اخري!');
        }
        return redirect(url('add-product/'))->with(['all_places'=>$all_places,'all_category'=>$all_category,'about_data'=>$about_data]);

}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function place_products($id)
    {

        $data_products = Product::Select()
        ->join('places' , 'places.id','=','products.place_id')
        ->select('products.*','places.id as place_id_as','places.user_id','places.name_ar','places.logo')
        ->where('products.place_id','=',$id)->paginate(5);



        $all_category = Category::Selection()->get();
        $about_data = AboutUs::first();
        return view('website.profile.products.place_products', ['data_products' => $data_products,'all_category' => $all_category,'about_data' =>  $about_data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $data_products = Product::Select()
            ->join('places' , 'places.id','=','products.place_id')
            ->select('products.*','places.id as place_id_as','places.name_ar','places.logo')
            ->where('products.id' , $id)->get();

        $all_places = Place::Select()->where('user_id',Auth::user()->id)->get();


        $product_gallary= ProductImages::Select()
        ->where('product_id',$id)->get();

        $all_category = Category::Selection()->get();

        $about_data = AboutUs::first();


        return view('website.profile.products.editeProduct', ['data_products' => $data_products,'all_places'=>$all_places,'product_gallary'=>$product_gallary,'all_category' => $all_category,'about_data' =>  $about_data,]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Update_Product($id,Request $request){

        $data_products = Product::Select()
            ->join('places' , 'places.id','=','products.place_id')
            ->select('products.*','places.id as place_id_as','places.name_ar','places.logo')
            ->where('products.id' , $id)->get();

            $all_places = Place::Select()->where('user_id',Auth::user()->id)->get();


        $product_gallary= ProductImages::Select()
        ->where('product_id',$id)->get();

        $all_category = Category::Selection()->get();

        $about_data = AboutUs::first();

        $update_at = carbon::now()->toDateTimeString();
        $dateTime = date('Y-m-d H:i:s',strtotime('+2 hours',strtotime($update_at)));


        $validated = $request->validate([
            'name' => 'required|max:20',
            'description' => 'required|max:200',
            'old_price' => 'required',
            'new_price' => '',
            'Equip'=>'required',
            'place_id' => 'required',
            'main_image'=> 'image|mimes:png,jpg,jpeg,gif',
        ]);



        $id_updete = Product::findorfail($id);

        if($request->hasFile('main_image')){
            file::delete('uploads/products/'.$id_updete->main_image);
            $img = $request->file('main_image');
            $extension = $img->extension();
            $newName= uniqid('',true).'.'.$extension;
            $path = 'uploads/products';
            $final = $img->move($path,$newName);
            $validate['main_image'] = $newName;
        }else{
            $validate['main_image'] = $id_updete->main_image;
        }



        $dataUpdate = Product::where('id',$id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'old_price' => $request->old_price,
            'new_price' => $request->new_price,
            'main_image' => $validate['main_image'],
            'Equip' => $request->Equip,
            'place_id'=>$request->place_id,
            'updated_at' => $dateTime,
        ]);



        if($dataUpdate){
            session()->flash('success','تعم التعديل بنجاح');
        }else{
            session()->flash('error','هناك خطأ ما , يرجي المحاوله مره اخري!');
        }
        return redirect(url('edit-products/'.$id))->with(['data_products' => $data_products,'all_places'=>$all_places,'product_gallary'=>$product_gallary,'all_category' => $all_category,'about_data' =>  $about_data,]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_products = Product::Select()
            ->join('places' , 'places.id','=','products.place_id')
            ->select('products.*','places.id as place_id_as','places.name_ar','places.logo')
            ->where('products.id' , $id)->get();

            $all_places = Place::Select()->where('user_id',Auth::user()->id)->get();


        $product_gallary= ProductImages::Select()
        ->where('product_id',$id)->get();

        $all_category = Category::Selection()->get();

        $about_data = AboutUs::first();


        $id_updete = Product::findorfail($id);
        file::delete('uploads/products/'.$id_updete->main_image);

        $product_gallary= ProductImages::Select()
        ->where('product_id',$id)->get();

        foreach($product_gallary as $img){
            file::delete('uploads/products/'.$img->image);
        }
        $result = Product::where('id', $id)->delete();
        if($result){

            session()->flash('success','تعم الحذف بنجاح');
            return redirect()->back()->with(['data_products' => $data_products,'all_places'=>$all_places,'product_gallary'=>$product_gallary,'all_category' => $all_category,'about_data' =>  $about_data,]);
        }else{
            session()->flash('error','هناك خطأ ما , يرجي المحاوله مره اخري!');
            return  redirect()->back()->with(['data_products' => $data_products,'all_places'=>$all_places,'product_gallary'=>$product_gallary,'all_category' => $all_category,'about_data' =>  $about_data,]);
        }
    }
}
