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


class productsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::Select()
        ->join('places' , 'places.id','=','products.place_id')
        ->select('products.*','places.id as place_id_as','places.name_ar','places.logo')
        ->where('products.is_active','1')->paginate(6);

            $all_category = Category::Selection()->get();

            $about_data = AboutUs::first();

            if(Auth::user() != NULL){
                $order_count = OrdersProducts::select()
                ->join('products','products.id','=','orders_products.product_id')
                ->join('users','users.id','=','orders_products.user_id')
                ->where('user_id',Auth::user()->id)
                ->where('orders_products.order_don',0)->get();

                $orders_coupons  = OrdersCoupons::select()
                ->join('place_discounts','place_discounts.id','=','orders_coupons.discounts_id')
                ->join('users','users.id','=','orders_coupons.user_id')
                ->select('orders_coupons.*','users.id as user_id','place_discounts.text','place_discounts.title','place_discounts.image',
                'place_discounts.code','place_discounts.old_price','place_discounts.new_price','place_discounts.expired_date')
                ->where('user_id',Auth::user()->id)->get();

                $count_orders= count($order_count)+ count($orders_coupons);
                return view('website.products.index', ['count_orders'=>$count_orders,'data' => $data,'all_category' => $all_category,'about_data' =>  $about_data]);

            }

            return view('website.products.index', ['data' => $data,'all_category' => $all_category,'about_data' =>  $about_data]);
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
    public function show($id)
    {



        $data = Product::Select()
        ->join('places' , 'places.id','=','products.place_id')
        ->select('products.*','places.id as place_id_as','places.name_ar','places.logo')
        ->where('products.id' , $id)->get();

        // dd($data);

        $product_gallary= ProductImages::Select()
        ->where('product_id',$id)->get();

        $all_category = Category::Selection()->get();

        $about_data = AboutUs::first();

        if(Auth::user() != NULL){
            $order_count = OrdersProducts::select()
            ->join('products','products.id','=','orders_products.product_id')
            ->join('users','users.id','=','orders_products.user_id')
            ->where('user_id',Auth::user()->id)
            ->where('orders_products.order_don',0)->get();

            $count_orders= count($order_count);
            // dd('');
            return view('website.products.details_products', ['count_orders'=>$count_orders,
                                                        'data' => $data,
                                                        'product_gallary'=>$product_gallary,
                                                        'all_category' => $all_category,
                                                        'about_data' =>  $about_data]);

        }

        return view('website.products.details_products', ['data' => $data,'product_gallary'=>$product_gallary,'all_category' => $all_category,'about_data' =>  $about_data,]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
        //
    }
}
