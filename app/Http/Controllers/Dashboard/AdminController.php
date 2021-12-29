<?php

namespace App\Http\Controllers\Dashboard;

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
use App\Models\Product;
use App\Models\Order_don;
use App\Models\OrdersProducts;
use App\Models\Admin;

class AdminController extends Controller
{

    public function index(){
        $users     = User::select()->get();
        $places    = Place::select()->get();
        $copouns   = PlaceDiscount::select()->get();
        $Product   = Product::select()->get();

        $Order_don = Order_don::select()
        ->join('orders_products','orders_products.id','=','orders_don.order_id')
        ->join('products','products.place_id','=','orders_products.place_id')
        ->join('users','users.id','=','orders_don.user_id')
        ->select('orders_don.*','orders_products.quantity','products.name As product_name','orders_products.place_id','products.old_price','products.new_price','products.main_image' ,'users.name')
        ->where('orders_don.type','product')->get();

        $shwar3na = Admin::where('name','admin')
            ->where('email','admin@gmail.com')
            ->where('phone','0124587452')->first();

        $money_shwar3na = $shwar3na->balance;


        return view('dashboard.dashboard',[
        'users'=>$users,
        'places'=>$places,
        'copouns'=>$copouns,
        'Product'=>$Product,
        'Order_don'=>$Order_don,
        'money_shwar3na' => $money_shwar3na,
        ]);
    }

}
