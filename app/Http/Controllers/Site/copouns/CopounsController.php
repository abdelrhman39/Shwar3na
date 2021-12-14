<?php

namespace App\Http\Controllers\Site\copouns;

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
use App\Models\OrdersProducts;
use App\Models\OrdersCoupons;
use Auth;

class CopounsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = PlaceDiscount::select()
        ->join('places', 'places.id', '=', 'place_discounts.id')
        ->select('place_discounts.*','places.id as place_id','places.logo','places.name_ar')
        ->paginate(6);
        $all_category = Category::Selection()->get();

        $about_data = AboutUs::first();
        if(Auth::user() != NULL){
            $order_count = OrdersProducts::select()
            ->join('products','products.id','=','orders_products.id')
            ->join('users','users.id','=','orders_products.user_id')
            ->where('user_id',Auth::user()->id)->get();

            $orders_coupons  = OrdersCoupons::select()
                ->join('place_discounts','place_discounts.id','=','orders_coupons.discounts_id')
                ->join('users','users.id','=','orders_coupons.user_id')
                ->select('orders_coupons.*','users.id as user_id','place_discounts.text','place_discounts.title','place_discounts.image',
                'place_discounts.code','place_discounts.old_price','place_discounts.new_price','place_discounts.expired_date')
                ->where('user_id',Auth::user()->id)->get();

            $count_orders= count($order_count)+count($orders_coupons);
            return view('website.coupons.index', ['count_orders'=>$count_orders,'data' => $data,'all_category' => $all_category,'about_data' =>  $about_data]);

        }

        return view('website.coupons.index', ['data' => $data,'all_category' => $all_category,'about_data' =>  $about_data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request )
    {
        $validated = $request->validate([
            'discounts_id' => 'required',
            'user_id' => 'required',
        ]);
        OrdersCoupons::create($validated);

        return redirect(url('copouns/'))->with('success' , "تم طلب الكوبون  بنجاح");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function destroys($id)
    {
        //
    }
}
