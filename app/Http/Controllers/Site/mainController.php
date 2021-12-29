<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\AboutUs;
use Auth;
use App\Models\Place;
use App\Models\PlaceTags;
use App\Models\OrdersProducts;
use App\Models\OrdersCoupons;
use App\Models\Testimonials;



class mainController extends Controller
{


    public function homePage(){

        $all_category = Category::Selection()->get();

        $about_data = AboutUs::first();

        if(Auth::user() != NULL){
            $order_count = OrdersProducts::select()
            ->join('Products','Products.id','=','orders_products.product_id')
            ->join('users','users.id','=','orders_products.user_id')
            ->where('user_id',Auth::user()->id)->get();

            $orders_coupons  = OrdersCoupons::select()
                ->join('place_discounts','place_discounts.id','=','orders_coupons.discounts_id')
                ->join('users','users.id','=','orders_coupons.user_id')
                ->select('orders_coupons.*','users.id as user_id','place_discounts.text','place_discounts.title','place_discounts.image',
                'place_discounts.code','place_discounts.old_price','place_discounts.new_price','place_discounts.expired_date')
                ->where('user_id',Auth::user()->id)->get();

            $count_orders= count($order_count)+count($orders_coupons);




            return view('website.Home.index', ['count_orders'=>$count_orders,'all_category' => $all_category, 'about_data' =>  $about_data]);

        }

        return view('website.Home.index', ['all_category' => $all_category, 'about_data' =>  $about_data]);
    }

    public function get_subcategory($categoryID){
        $data = SubCategory::select('name', 'id')->where('category_id', $categoryID)->get();
        return response()->json($data);
    }

    public function site_logout(Request $request) {
        Auth::guard('web')->logout();
        $this->guard('web')->logout();

        $request->session()->invalidate();
        return redirect('/index');
    }

    public function contactUs(){
        $all_category = Category::Selection()->get();

        $about_data = AboutUs::first();

        return view('website.aboutUs.contact', ['all_category' => $all_category, 'about_data' => $about_data]);
    }

    public function search(Request $request)
    {

        $key = trim($request->get('q'));
        if($key != null){
            $category = trim($request->get('category'));
            $posts = Place::query()
            ->join('locations', 'places.location_id', '=', 'locations.id')
            ->join('category', 'places.Category_id', '=', 'category.id')
            //->join('users', 'places.user_id', '=', 'users.id')
            ->select('places.*', 'locations.name As location', 'category.name As category_name')

            ->orWhere('name_ar', 'like', "%{$key}%")
            ->orWhere('description', 'like', "%{$key}%")
            ->paginate(6);
        }else{
            $category = trim($request->get('category'));
            $posts = Place::query()
            ->join('locations', 'places.location_id', '=', 'locations.id')
            ->join('category', 'places.Category_id', '=', 'category.id')
            // ->join('users', 'places.user_id', '=', 'users.id')
            ->select('places.*', 'locations.name As location', 'category.name As category_name')
            ->where('places.Category_id', 'like', "%{$category}%")
            ->paginate(6);

            if(strlen($key) < 1 and strlen($category) < 1){
                $posts = Place::query()
                ->join('locations', 'places.location_id', '=', 'locations.id')
                ->join('category', 'places.Category_id', '=', 'category.id')
                //->join('users', 'places.user_id', '=', 'users.id')
                ->select('places.*', 'locations.name As location', 'category.name As category_name')
                ->paginate(6);
            }
        }





        $all_category = Category::Selection()->get();

        $about_data = AboutUs::first();

        return view('search', [
            'all_category' => $all_category,
            'about_data' => $about_data,
            'key' => $key,
            'posts' => $posts,

        ]);
    }

    public function search_tags(Request $request)
    {


        $key = trim($request->get('q'));

            $category = trim($request->get('category'));
            $posts = PlaceTags::query()
            ->join('places', 'places.id', '=', 'place_tags.place_id')
            ->join('locations', 'places.location_id', '=', 'locations.id')
            ->join('category', 'places.Category_id', '=', 'category.id')
            // ->join('users', 'places.user_id', '=', 'users.id')
            ->select('places.*', 'locations.name As location', 'category.name As category_name',)

            ->orWhere('place_tags.text', 'like', "%{$key}%")
            ->orWhere('place_tags.text', 'like', "%{$category}%")
            ->paginate(6);


        $all_category = Category::Selection()->get();

        $about_data = AboutUs::first();

        return view('search', [
            'all_category' => $all_category,
            'about_data' => $about_data,
            'key' => $key,
            'posts' => $posts,

        ]);
    }

    public function add_testimonials(Request $request)
    {

        $validate = $request->validate([
            'comment' => 'required|string|regex:/[a-zA-Z]{0,}[0-9]{0,}/',
        ]);

        $add = new Testimonials;
        $add->user_id	= Auth::user()->id;
        $add->comment = $validate['comment'];
        $add->is_active = 0;
        $add->save();
        return redirect()->back()->with('success','تم اضافة رأيك بنجاح');
    }

}
