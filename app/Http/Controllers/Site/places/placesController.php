<?php

namespace App\Http\Controllers\Site\places;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PlaceRequest;
use App\Http\Controllers\Manage\BaseController;
use carbon\carbon;
use App\Models\Place;
use App\Models\User;
use App\Models\Job;
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
use Auth;
use App\Models\Product;
use App\Models\OrdersProducts;
use App\Models\OrdersCoupons;


class placesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Place::Select()
            ->join('category', 'places.Category_id', '=', 'category.id')
            // ->join('users', 'places.user_id', '=', 'users.id')
            ->select('places.*', 'category.name As category_name')
            ->where('places.state' , 'accept')->Paginate(6);

            $all_category = Category::Selection()->get();

            $about_data = AboutUs::first();

            foreach($data as $fav){
                $favorite = Place::find($fav->id)->favoritesCount;
            }




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
                return view('website.places.index', ['count_orders'=>$count_orders,'data' => $data,
                                                'all_category' => $all_category,'about_data' =>  $about_data,'favorite'=>$favorite]);

            }

            return view('website.places.index', ['data' => $data,'all_category' => $all_category,'about_data' =>  $about_data,'favorite'=>$favorite]);
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

        $all_category = Category::Selection()->get();

        $about_data = AboutUs::first();
        $users = User::get();
        Place::Select()->where('id',$id)->increment('views');


        $data = Place::Select()
            ->join('category', 'places.Category_id', '=', 'category.id')
            ->join('users', 'places.user_id', '=', 'users.id')
            ->select('places.*',  'category.name As category_name','users.id as user_id','users.name','users.image as img_user')
            ->where('places.id',$id)->get();

        $place = Place::find($id);

        if(Auth::user()){
            $user = User::find(Auth::user()->id);

            $user->favorite($place);


            if(count($user->favorite(Place::class)) > 0){
                $data[0]['favorite']=1;
            }else{
                $data[0]['favorite']=0;
            }
        }



        $place_time= PlaceTime::Select()
            ->join('places', 'place_time.place_id', '=', 'places.id')
            ->where('place_time.place_id',$id)->get();

        $place_gallary= PlaceGallary::Select()
            ->join('places', 'place_gallary.place_id', '=', 'places.id')
            ->where('place_gallary.place_id',$id)->get();

        $place_disc= PlaceDiscount::Select()
            ->join('places', 'place_discounts.place_id', '=', 'places.id')
            ->where('place_discounts.place_id',$id)->get();

        $place_products= Product::Select()
            ->join('places', 'products.place_id', '=', 'places.id')
            ->where('products.place_id',$id)->get();

        $place_job= Job::Select()
            ->join('places', 'jobs.place_id', '=', 'places.id')
            ->where('jobs.place_id',$id)->get();

        $PlaceTags= PlaceTags::Select()->where('place_id','=',$id)->get();


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

                return view('website.places.details_place', ['count_orders'=>$count_orders,'data' => $data,
                                                             'place_time' => $place_time,'place_disc'=>$place_disc,
                                                             'place_products'=>$place_products,
                                                             'place_job'=>$place_job,
                                                             'place_gallary' =>$place_gallary,'place_tags'=>$PlaceTags,
                                                             'all_category' => $all_category,'about_data' =>  $about_data,'users'=>$users]);
            }



        return view('website.places.details_place', ['data' => $data,'place_time' => $place_time,'place_disc'=>$place_disc,'place_products'=>$place_products,'place_job'=>$place_job,
                                    'place_gallary' =>$place_gallary,'place_tags'=>$PlaceTags,
                                    'all_category' => $all_category,'about_data' =>  $about_data,'users'=>$users]);
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

    public function filtter_places(Request $request)
    {


        $data = Place::Select()
            ->join('category', 'places.Category_id', '=', 'category.id')
            // ->join('users', 'places.user_id', '=', 'users.id')
            ->select('places.*', 'category.name As category_name')
            ->where('places.state' , 'accept')
            ->Where('places.Category_id',$request->Category_id)
            ->whereBetween('places.price_range' ,[$request->range_from,$request->range_to])
            ->paginate(6);

        $range_from  = $request->range_from;
        $range_to    = $request->range_to;
        $Category_id = $request->Category_id;
        $Keywords    = $request->Keywords;

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
                return view('website.places.index', ['count_orders'=>$count_orders,'data' => $data,'all_category' => $all_category,'about_data' =>  $about_data,
                'range_from'=>$range_from,'range_to'=>$range_to,'Category_id'=>$Category_id,'Keywords'=>$Keywords]);

            }

            return view('website.places.index', ['data' => $data,'all_category' => $all_category,'about_data' =>  $about_data,
            'range_from'=>$range_from,'range_to'=>$range_to,'Category_id'=>$Category_id,'Keywords'=>$Keywords]);
    }


    public function Favorit($id)
    {
        $place = Place::find($id);
        $user = User::find(Auth::user()->id);

        $user->favorite($place);


        if(count($user->favorite(Place::class)) > 0){
            return redirect()->back()->with(['error'=>'لقت قمت بإضافة هذا المحل من قبل ']);
        }else{
            $user->addFavorite($place); // The user added to favorites this post
            return redirect()->back()->with(['success'=>'تم اضافة المحل في المفضله']);
        }
    }
}
