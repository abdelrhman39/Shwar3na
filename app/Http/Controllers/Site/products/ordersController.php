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
use App\Models\Order_don;
use Auth;
use Mail;
use App\Models\Admin;




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
            'place_id'=>'required',
            'product_id' => 'required',
            'user_id' => 'required',
            'quantity' => 'required',
        ]);

        $data = Product::Select()->where('id',$request->product_id)->get();

        $place_id = Place::select()->where('id',$data[0]->place_id)->get();



        if($place_id[0]->user_id == Auth::user()->id){
            return redirect(url('products/'.$validated['product_id']))->with('error' , "انت صاحب المنتج بتشتريه ليه يا عم!  ");
        }

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
            ->join('products','products.id','=','orders_products.product_id')
            ->join('users','users.id','=','orders_products.user_id')
            ->select('orders_products.*','users.id as user_id','products.id as prod_id','products.name','products.old_price','products.new_price')
            ->where('user_id',Auth::user()->id)->where('order_don',0)->Paginate(5);

        $orders_coupons  = OrdersCoupons::select()
            ->join('place_discounts','place_discounts.id','=','orders_coupons.discounts_id')
            ->join('users','users.id','=','orders_coupons.user_id')
            ->select('orders_coupons.*','users.id as user_id','place_discounts.text','place_discounts.title','place_discounts.image',
            'place_discounts.code','place_discounts.old_price','place_discounts.new_price','place_discounts.expired_date')
            ->where('user_id',Auth::user()->id)->Paginate(5);



        // dd($count_order);
        return view('website.profile.orders',['count_order'=>$count_order,'orders_coupons'=>$orders_coupons,'all_category' => $all_category, 'about_data' =>  $about_data]);
    }

    public function show_order_don()
    {
        $all_category = Category::Selection()->get();

        $about_data = AboutUs::first();

        $count_order = OrdersProducts::select()
            ->join('products','products.id','=','orders_products.product_id')
            ->join('users','users.id','=','orders_products.user_id')
            ->join('orders_don','orders_don.order_id','=','orders_products.id')
            ->select('orders_products.*','users.id as user_id','products.id as prod_id','products.name','products.old_price','products.new_price','orders_don.order_number','orders_don.state')
            ->where('orders_products.user_id',Auth::user()
            ->id)->where('order_don',1)->get();

        $orders_coupons  = OrdersCoupons::select()
            ->join('place_discounts','place_discounts.id','=','orders_coupons.discounts_id')
            ->join('users','users.id','=','orders_coupons.user_id')
            ->select('orders_coupons.*','users.id as user_id','place_discounts.text','place_discounts.title','place_discounts.image',
            'place_discounts.code','place_discounts.old_price','place_discounts.new_price','place_discounts.expired_date')
            ->where('user_id',Auth::user()->id)->get();



        // dd($count_order);
        return view('website.profile.orders_don',['count_order'=>$count_order,'orders_coupons'=>$orders_coupons,'all_category' => $all_category, 'about_data' =>  $about_data]);
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


    public function order_don(Request $request)
    {

        $all_category = Category::Selection()->get();

        $about_data = AboutUs::first();

        $count_order = OrdersProducts::select()
            ->join('products','products.id','=','orders_products.product_id')
            ->join('users','users.id','=','orders_products.user_id')
            ->select('orders_products.*','users.id as user_id','products.id as prod_id','products.name','products.old_price','products.new_price')
            ->where('user_id',Auth::user()->id)->Paginate(5);

        $orders_coupons  = OrdersCoupons::select()
            ->join('place_discounts','place_discounts.id','=','orders_coupons.discounts_id')
            ->join('users','users.id','=','orders_coupons.user_id')
            ->select('orders_coupons.*','users.id as user_id','place_discounts.text','place_discounts.title','place_discounts.image',
            'place_discounts.code','place_discounts.old_price','place_discounts.new_price','place_discounts.expired_date')
            ->where('user_id',Auth::user()->id)->Paginate(5);


        if(!$request->address){
            session()->flash('error','!!...من فضلك ادخل عنوان الاوردر تفصيلي ليصلك الاوردر لباب البيت');
            return redirect()->back()->with(['count_order'=>$count_order,'orders_coupons'=>$orders_coupons,'all_category' => $all_category, 'about_data' =>  $about_data]);
        }

        $validated = $request->validate([
            'user_id' => 'required',
            'order_id' => 'required',
            'type'=>'required',
            'order_number'=>'required',
            'address'=>'required',
            'wallet' => 'nullable|numeric|max:1|min:1',
        ]);


        if($validated['wallet']){

            $user = User::where('id',$validated['user_id'])->first();
            $shwar3na = Admin::where('name','shwar3na')
            ->where('email','eng.a.mohammed89@gmail.com')
            ->where('phone','01111319393')->first();

            $user->wallet->refreshBalance();
            $shwar3na->wallet->refreshBalance();

            if($user->balance > $request->total){
                $result_transfer = $user->transfer($shwar3na, $request->total);
                if($result_transfer){
                    $arr_data_orderID = explode(",", $request->order_id);
                    $i=0;
                    foreach($arr_data_orderID as $orderID){

                        if($orderID > 0){
                            $i++;
                            $result = new Order_don;
                            $result->user_id      = $validated['user_id'];
                            $result->order_id     = $orderID;
                            $result->type         = $validated['type'];
                            $result->order_number = $result_transfer->uuid;
                            $result->address      = $validated['address'];
                            $result->state        = '';
                            // $result->place_id = $request->place_id[$i];
                            $result->save();


                        }
                        $updateOrder_don = OrdersProducts::where('id' , $orderID)->update(['order_don' => 1]);
                    }
                    $data_order = OrdersProducts::select()
                    ->join('users','orders_products.user_id','=','users.id')
                    ->join('orders_don','orders_don.order_id','=','orders_products.id')
                    ->join('products','orders_products.product_id','=','products.id')
                    ->join('places','places.id','=','orders_products.place_id')

                    ->select('orders_don.*','users.name as user_name',
                    'orders_products.id as orders_products_id','orders_products.product_id',
                    'orders_products.place_id',
                    'orders_products.quantity','products.name as products_name',
                    'products.description','products.old_price','products.new_price','products.main_image','places.name_ar','places.logo as logo_place')
                    ->where('orders_don.user_id',Auth::user()->id)
                    ->where('orders_don.type','product')
                    ->where('orders_don.order_number',$result->order_number)->get();

                    Mail::send('mails.mail_order_don',['total'=>$request->total,
                        'data_order'=>$data_order,'method'=>'من خلال محفظة شوارعنا'], function($message) use($request){
                        $message->to(Auth::user()->email);
                        $message->subject('تأكيد شراء منتجات من شوارعنا');
                    });
                    session()->flash('success','تم تأكيد شراء المنتجات وسيتم التواصل معك قريبا');
                    return redirect()->back()->with(['count_order'=>$count_order,'orders_coupons'=>$orders_coupons,'all_category' => $all_category, 'about_data' =>  $about_data]);
                }
            }else{
                session()->flash('error','ليس لديك مال للشراء');
                return redirect()->back()->with(['count_order'=>$count_order,'orders_coupons'=>$orders_coupons,'all_category' => $all_category, 'about_data' =>  $about_data]);
            }

        }



        $arr_data_orderID = explode(",", $request->order_id);
        // $arr_data_placeID = explode(",",$request->place_id);

        $i=0;
        foreach($arr_data_orderID as $orderID){

            if($orderID > 0){
                $i++;
                $result = new Order_don;
                $result->user_id      = $validated['user_id'];
                $result->order_id     = $orderID;
                $result->type         = $validated['type'];
                $result->order_number = $validated['order_number'];
                $result->address      = $validated['address'];
                $result->state        = '';
                // $result->place_id = $request->place_id[$i];
                $result->save();


            }
            $updateOrder_don = OrdersProducts::where('id' , $orderID)->update(['order_don' => 1]);
        }




        // foreach($arr_data_orderID as $orderID){
        //     if($orderID > 0){
        //         foreach($arr_data_placeID as $placeID){
        //             $updates = Order_don::where('id' , $orderID)->update(['place_id' => $placeID]);
        //         }

        //     }
        //         if($updates){
        //             $updateOrder_don = OrdersProducts::where('id' , $orderID)->update(['order_don' => 1]);
        //         }else{
        //             dd('error');
        //         }

        // }



        $data_order = OrdersProducts::select()
        ->join('users','orders_products.user_id','=','users.id')
        ->join('orders_don','orders_don.order_id','=','orders_products.id')
        ->join('products','orders_products.product_id','=','products.id')
        ->join('places','places.id','=','orders_products.place_id')

        ->select('orders_don.*','users.name as user_name',
        'orders_products.id as orders_products_id','orders_products.product_id',
        'orders_products.place_id',
        'orders_products.quantity','products.name as products_name',
        'products.description','products.old_price','products.new_price','products.main_image','places.name_ar','places.logo as logo_place')
        ->where('orders_don.user_id',Auth::user()->id)
        ->where('orders_don.type','product')
        ->where('orders_don.order_number',$result->order_number)->get();


        if($result){
            Mail::send('mails.mail_order_don',['total'=>$request->total,
                'data_order'=>$data_order,'method'=>'كاش عند الاستلام'], function($message) use($request){
                $message->to(Auth::user()->email);
                $message->subject('تأكيد شراء منتجات من شوارعنا');
            });

            session()->flash('success','تم تأكيد شراء المنتجات وسيتم التواصل معك قريبا');
        }else{
            session()->flash('error','هناك خطأ ما , يرجي المحاوله مره اخري!');
        }

        return redirect()->back()->with(['count_order'=>$count_order,'orders_coupons'=>$orders_coupons,'all_category' => $all_category, 'about_data' =>  $about_data]);

    }





    // Start State Order

    public function cancel_order($orderID)
    {
        $all_category = Category::Selection()->get();

        $about_data = AboutUs::first();

        $Order_don = Order_don::where('id' , $orderID)->first();
        $order_id  = OrdersProducts::where('id' , $orderID)->first();
        $price_product = Product::where('id' , $order_id->product_id)->first();
        $pric = 0;
        if ($price_product->new_price != Null){
            $pric = $price_product->new_price ;
        }else{
            $pric = $price_product->old_price;
        }
        $user = User::where('id',$Order_don->user_id)->first();
        $shwar3na = Admin::where('name','shwar3na')
        ->where('email','eng.a.mohammed89@gmail.com')
        ->where('phone','01111319393')->first();

        $user->wallet->refreshBalance();
        $shwar3na->wallet->refreshBalance();

        $result_transfer = $shwar3na->transfer($user, $pric);


        $count_order = OrdersProducts::select()
            ->join('products','products.id','=','orders_products.product_id')
            ->join('users','users.id','=','orders_products.user_id')
            ->select('orders_products.*','users.id as user_id','products.id as prod_id','products.name','products.old_price','products.new_price')
            ->where('user_id',Auth::user()->id)->where('order_don',0)->Paginate(5);

        $orders_coupons  = OrdersCoupons::select()
            ->join('place_discounts','place_discounts.id','=','orders_coupons.discounts_id')
            ->join('users','users.id','=','orders_coupons.user_id')
            ->select('orders_coupons.*','users.id as user_id','place_discounts.text','place_discounts.title','place_discounts.image',
            'place_discounts.code','place_discounts.old_price','place_discounts.new_price','place_discounts.expired_date')
            ->where('user_id',Auth::user()->id)->Paginate(5);

        $updateOrder_don = Order_don::where('id' , $orderID)->update(['state' => 'cancel']);

        if($updateOrder_don){
            session()->flash('success','تم رفض الطلب بنجاح');
        }else{
            session()->flash('error','هناك خطأ ما , يرجي المحاوله مره اخري!');
        }

        // dd($count_order);
        return view(url('profileDashboard'),['count_order'=>$count_order,'orders_coupons'=>$orders_coupons,'all_category' => $all_category, 'about_data' =>  $about_data]);
    }


    public function Accepted_order($orderID)
    {
        $all_category = Category::Selection()->get();

        $about_data = AboutUs::first();

        $count_order = OrdersProducts::select()
            ->join('products','products.id','=','orders_products.product_id')
            ->join('users','users.id','=','orders_products.user_id')
            ->select('orders_products.*','users.id as user_id','products.id as prod_id','products.name','products.old_price','products.new_price')
            ->where('user_id',Auth::user()->id)->where('order_don',0)->Paginate(5);

        $orders_coupons  = OrdersCoupons::select()
            ->join('place_discounts','place_discounts.id','=','orders_coupons.discounts_id')
            ->join('users','users.id','=','orders_coupons.user_id')
            ->select('orders_coupons.*','users.id as user_id','place_discounts.text','place_discounts.title','place_discounts.image',
            'place_discounts.code','place_discounts.old_price','place_discounts.new_price','place_discounts.expired_date')
            ->where('user_id',Auth::user()->id)->Paginate(5);

        $updateOrder_don = Order_don::where('id' , $orderID)->update(['state' => 'Accepted']);

        if($updateOrder_don){
            session()->flash('success','تم قبول الطلب بنجاح');
        }else{
            session()->flash('error','هناك خطأ ما , يرجي المحاوله مره اخري!');
        }

        // dd($count_order);
        return redirect()->back()->with(['count_order'=>$count_order,'orders_coupons'=>$orders_coupons,'all_category' => $all_category, 'about_data' =>  $about_data]);
    }

    public function Shipped_order($orderID)
    {
        $all_category = Category::Selection()->get();

        $about_data = AboutUs::first();

        $count_order = OrdersProducts::select()
            ->join('products','products.id','=','orders_products.product_id')
            ->join('users','users.id','=','orders_products.user_id')
            ->select('orders_products.*','users.id as user_id','products.id as prod_id','products.name','products.old_price','products.new_price')
            ->where('user_id',Auth::user()->id)->where('order_don',0)->Paginate(5);

        $orders_coupons  = OrdersCoupons::select()
            ->join('place_discounts','place_discounts.id','=','orders_coupons.discounts_id')
            ->join('users','users.id','=','orders_coupons.user_id')
            ->select('orders_coupons.*','users.id as user_id','place_discounts.text','place_discounts.title','place_discounts.image',
            'place_discounts.code','place_discounts.old_price','place_discounts.new_price','place_discounts.expired_date')
            ->where('user_id',Auth::user()->id)->Paginate(5);

        $updateOrder_don = Order_don::where('id' , $orderID)->update(['state' => 'Shipped']);

        if($updateOrder_don){
            session()->flash('success','تم قبول وشحن الطلب بنجاح');
        }else{
            session()->flash('error','هناك خطأ ما , يرجي المحاوله مره اخري!');
        }

        // dd($count_order);
        return redirect()->back()->with(['count_order'=>$count_order,'orders_coupons'=>$orders_coupons,'all_category' => $all_category, 'about_data' =>  $about_data]);
    }


    public function delivered_order($orderID)
    {
        $all_category = Category::Selection()->get();

        $about_data = AboutUs::first();

        $count_order = OrdersProducts::select()
            ->join('products','products.id','=','orders_products.product_id')
            ->join('users','users.id','=','orders_products.user_id')
            ->select('orders_products.*','users.id as user_id','products.id as prod_id','products.name','products.old_price','products.new_price')
            ->where('user_id',Auth::user()->id)->where('order_don',0)->Paginate(5);

        $orders_coupons  = OrdersCoupons::select()
            ->join('place_discounts','place_discounts.id','=','orders_coupons.discounts_id')
            ->join('users','users.id','=','orders_coupons.user_id')
            ->select('orders_coupons.*','users.id as user_id','place_discounts.text','place_discounts.title','place_discounts.image',
            'place_discounts.code','place_discounts.old_price','place_discounts.new_price','place_discounts.expired_date')
            ->where('user_id',Auth::user()->id)->Paginate(5);

        $updateOrder_don = Order_don::where('id' , $orderID)->update(['state' => 'delivered']);

        if($updateOrder_don){
            session()->flash('success','تم تسليم الطلب بنجاح');
        }else{
            session()->flash('error','هناك خطأ ما , يرجي المحاوله مره اخري!');
        }

        // dd($count_order);
        return redirect()->back()->with(['count_order'=>$count_order,'orders_coupons'=>$orders_coupons,'all_category' => $all_category, 'about_data' =>  $about_data]);
    }

    // End State Order


}
