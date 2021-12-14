<?php

namespace App\Http\Controllers\Site\products;

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
use Auth;


class ordersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function add_order(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required',
            'user_id' => 'required',
            'quantity' => 'required',
        ]);
        OrdersProducts::create($validated);

        return redirect(url('products/'.$validated['product_id']))->with('success' , "تم أضافه المنتج بنجاح");

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $all_category = Category::Selection()->get();

        $about_data = AboutUs::first();

        $count_order = OrdersProducts::select()
            ->join('products','products.id','=','orders_products.id')
            ->join('users','users.id','=','orders_products.user_id')
            ->select('orders_products.*','users.id as user_id','products.id as prod_id','products.name','products.old_price','products.new_price')
            ->where('user_id',Auth::user()->id)->Paginate(5);

        $orders_coupons  = OrdersCoupons::select()
            ->join('place_discounts','place_discounts.id','=','orders_coupons.discounts_id')
            ->join('users','users.id','=','orders_coupons.user_id')
            ->select('orders_coupons.*','users.id as user_id','place_discounts.text','place_discounts.title','place_discounts.image',
            'place_discounts.code','place_discounts.old_price','place_discounts.new_price','place_discounts.expired_date')
            ->where('user_id',Auth::user()->id)->Paginate(5);



        // dd($count_order);
        return view('website.profile.orders',['count_order'=>$count_order,'orders_coupons'=>$orders_coupons,'all_category' => $all_category, 'about_data' =>  $about_data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function my_order()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $all_category = Category::Selection()->get();

        $about_data = AboutUs::first();
        $count_order = OrdersProducts::select()
            ->join('products','products.id','=','orders_products.id')
            ->join('users','users.id','=','orders_products.user_id')
            ->select('orders_products.*','users.id as user_id','products.id as prod_id','products.name','products.old_price','products.new_price')
            ->where('user_id',Auth::user()->id)->get();
        $result = OrdersProducts::where('id', '=', $id)->delete();
        if($result){

            session()->flash('success','تم الحذف بنجاح!');
        return redirect()->back()->with(['count_order'=>$count_order,'all_category' => $all_category, 'about_data' =>  $about_data]);
        }else{
        session()->flash('error','هناك خطأ ما , يرجي المحاوله مره اخري!');
        return redirect()->back()->with(['count_order'=>$count_order,'all_category' => $all_category, 'about_data' =>  $about_data]);
        }
    }

    public function destroy_coupons($id)
    {
        $all_category = Category::Selection()->get();

        $about_data = AboutUs::first();
        $count_order = OrdersProducts::select()
            ->join('products','products.id','=','orders_products.id')
            ->join('users','users.id','=','orders_products.user_id')
            ->select('orders_products.*','users.id as user_id','products.id as prod_id','products.name','products.old_price','products.new_price')
            ->where('user_id',Auth::user()->id)->get();
        $result = OrdersCoupons::where('id', '=', $id)->delete();
        if($result){

            session()->flash('success','تم الحذف بنجاح!');
        return redirect()->back()->with(['count_order'=>$count_order,'all_category' => $all_category, 'about_data' =>  $about_data]);
        }else{
        session()->flash('error','هناك خطأ ما , يرجي المحاوله مره اخري!');
        return redirect()->back()->with(['count_order'=>$count_order,'all_category' => $all_category, 'about_data' =>  $about_data]);
        }
    }
}
