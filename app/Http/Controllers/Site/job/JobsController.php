<?php

namespace App\Http\Controllers\Site\job;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
use App\Models\Job;
use App\Models\JobCategory;
use App\Models\OrdersProducts;
use App\Models\OrdersCoupons;
use App\Models\ApplyJob;
use Auth;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Job::Select()
        ->leftjoin('job_category', 'jobs.jobCat_id', '=', 'job_category.id')
        ->select('jobs.*' , 'job_category.id as id_cat' , 'job_category.name')->paginate(6);

        $all_category = Category::Selection()->get();

        $about_data = AboutUs::first();

        if(Auth::user() != NULL){
            $order_count = OrdersProducts::select()
            ->join('Products','Products.id','=','orders_products.id')
            ->join('users','users.id','=','orders_products.user_id')
            ->where('user_id',Auth::user()->id)->get();

            $orders_coupons  = OrdersCoupons::select()
                ->join('place_discounts','place_discounts.id','=','orders_coupons.discounts_id')
                ->join('users','users.id','=','orders_coupons.user_id')
                ->select('orders_coupons.*','users.id as user_id','place_discounts.text','place_discounts.title','place_discounts.image',
                'place_discounts.code','place_discounts.old_price','place_discounts.new_price','place_discounts.expired_date')
                ->where('user_id',Auth::user()->id)->get();

            $count_orders= count($order_count)+count($orders_coupons);
            return view('website.jobs.index', ['count_orders'=>$count_orders,'data' => $data,'all_category' => $all_category,'about_data' =>  $about_data]);
        }


        return view('website.jobs.index', ['data' => $data,'all_category' => $all_category,'about_data' =>  $about_data]);
    }

    /**
     * apply_job the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function apply_job($place_id,Request $request)
    {

        $validated = $request->validate([
            'job_id' => 'required',
            'user_id' => 'required',
        ]);

        $data = job::Select()->where('id',$request->job_id)->get();

            if($data[0]->user_id == Auth::user()->id){
                return redirect(url('jobs/'.$validated['job_id']))->with('error' , "انت صاحب الوظيفه ولايصح تقدمك عليها");
            }



        ApplyJob::create($validated);

        return redirect(url('jobs/'.$validated['job_id']))->with('success' , "تم التقدم للوظيفة بنجاح");

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
        $data = job::Select()
        ->leftjoin('job_category', 'jobs.jobCat_id', '=', 'job_category.id')
        ->select('jobs.*' , 'job_category.id as id_cat' , 'job_category.name')
        ->where('jobs.id',$id)->get();

        $all_category = Category::Selection()->get();

        $about_data = AboutUs::first();
        if(Auth::user() != NULL){
            $order_count = OrdersProducts::select()
            ->join('Products','Products.id','=','orders_products.id')
            ->join('users','users.id','=','orders_products.user_id')
            ->where('user_id',Auth::user()->id)->get();

            $count_orders= count($order_count);
            return view('website.jobs.job_details', ['count_orders'=>$count_orders,'data' => $data,'all_category' => $all_category,'about_data' =>  $about_data]);
        }
        return view('website.jobs.job_details', ['data' => $data,'all_category' => $all_category,'about_data' =>  $about_data]);
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
