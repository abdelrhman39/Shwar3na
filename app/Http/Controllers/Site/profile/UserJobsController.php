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
use App\Models\JobCategory;
use App\Models\Job;
use Auth;

class UserJobsController extends Controller
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
        // dd(' ');
        $all_category = Category::get();
        $about_data = AboutUs::first();
        $all_places = Place::where('user_id','=',Auth::User()->id)->get();

        $JobCategory = JobCategory::get();


        return view('website.profile.jobs.create',['all_places'=>$all_places,'JobCategory'=>$JobCategory,'all_category'=>$all_category,'about_data'=>$about_data]);

    }

    /**
     * add_jop a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add_job(Request $request)
    {
        $created_at = carbon::now()->toDateTimeString();
        $dateTime = date('Y-m-d H:i:s',strtotime('+2 hours',strtotime($created_at)));


        $validated = $request->validate([
            'title' => 'required|max:100',
            'description' => 'required|max:250',
            'email' => 'required|email',
            'count' => 'required',
            'end_date' => 'required',
            'type' => 'required',
            'image'=> 'image|mimes:png,jpg,jpeg,gif',
            'requirment_job' => 'required',
            'jobCat_id' => 'required',
            'sallary' => 'required',
            'is_active' => 'required',
            'user_id' => 'required',
            'place_id' => 'required',
        ]);

        $add =  new Job;
        $add->title = $request->title;
        $add->description = $request->description;
        $add->email = $request->email;
        $add->image = $request->file('image') ? BaseController::saveImage("jobs" , $request->file('image')) : "img.png";
        $add->count = $request->count;
        $add->end_date = $request->end_date;
        $add->type = $request->type;
        $add->requirment_job = $request->requirment_job;
        $add->jobCat_id = $request->jobCat_id;
        $add->sallary = $request->sallary;
        $add->is_active = 0;
        $add->user_id = $request->user_id;
        $add->place_id = $request->place_id;
        $add->created_at = $dateTime;

        $add->save();
        if($add->save()){
            return redirect()->route('user.FormJob.add')->with('success' , "تم أضافة وظيفة جديدة");
        }else{
            return redirect()->route('user.FormJob.add')->with('erorr' , "هناك خطأ ما يرجي المحاوله مره اخري!");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_all_jobs()
    {

        $all_category = Category::get();
        $about_data = AboutUs::first();
        $all_MyJobs = Job::where('user_id','=',Auth::User()->id)->Paginate(5);
        // dd($all_MyJops);
        $JobCategory = JobCategory::get();



        return view('website.profile.jobs.index',['all_MyJobs'=>$all_MyJobs,'JobCategory'=>$JobCategory,'all_category'=>$all_category,'about_data'=>$about_data]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $all_category = Category::get();
        $about_data = AboutUs::first();
        $job = Job::where('id',$id)->where('user_id',Auth::user()->id)->get();
        $all_places = Place::where('user_id','=',Auth::User()->id)->get();

        $JobCategory = JobCategory::get();


        return view('website.profile.jobs.editJop',['all_places'=>$all_places,'job'=>$job,'JobCategory'=>$JobCategory,'all_category'=>$all_category,'about_data'=>$about_data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Update_jobs($id,Request $request){
// dd('');
        $all_category = Category::get();
        $about_data = AboutUs::first();
        $job = Job::where('id',$id)->where('user_id',Auth::user()->id)->get();
        $all_places = Place::where('user_id','=',Auth::User()->id)->get();

        $JobCategory = JobCategory::get();

        $update_at = carbon::now()->toDateTimeString();
        $dateTime = date('Y-m-d H:i:s',strtotime('+2 hours',strtotime($update_at)));


        $validated = $request->validate([
            'title' => 'required|max:100',
            'description' => 'required|max:250',
            'email' => 'required|email',
            'count' => 'required',
            'end_date' => 'required',
            'type' => 'required',
            'image'=> 'image|mimes:png,jpg,jpeg,gif',
            'requirment_job' => 'required',
            'jobCat_id' => 'required',
            'sallary' => 'required',
            'is_active' => 'required',
            'user_id' => 'required',
            'place_id' => 'required',
        ]);



        $id_updete = Job::findorfail($id);

        if($request->hasFile('image')){
            file::delete('uploads/jobs/'.$id_updete->image);
            $img = $request->file('image');
            $extension = $img->extension();
            $newName= uniqid('',true).'.'.$extension;
            $path = 'uploads/jobs';
            $final = $img->move($path,$newName);
            $validate['image'] = $newName;
        }else{
            $validate['image'] = $id_updete->image;
        }



        $dataUpdate = Job::where('id',$id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'email'    => $request->email,
            'count' => $request->count,
            'end_date' => $request->end_date,
            'type' => $request->type,
            'image' =>  $validate['image'],
            'requirment_job'=> $request->requirment_job,
            'jobCat_id'=> $request->jobCat_id,
            'sallary'=> $request->sallary,
            'is_active'=>$request->is_active,
            'user_id'=>$request->user_id,
            'place_id'=>$request->place_id,
            'updated_at' => $dateTime,
        ]);

        if($dataUpdate){
            session()->flash('success','تعم التعديل بنجاح');
        }else{
            session()->flash('error','هناك خطأ ما , يرجي المحاوله مره اخري!');
        }
        return view('website.profile.jobs.editJop',['all_places'=>$all_places,'job'=>$job,'JobCategory'=>$JobCategory,'all_category'=>$all_category,'about_data'=>$about_data]);

    }


    public function place_jobs($id)
    {

        $data_jobs = Job::Select()
        ->join('places' , 'places.id','=','jobs.place_id')
        ->select('jobs.*','jobs.id as job_id_as','places.user_id','places.name_ar','places.logo')
        ->where('jobs.place_id','=',$id)->paginate(5);


        // dd(Auth::user()->id);

        $all_category = Category::Selection()->get();
        $about_data = AboutUs::first();
        return view('website.profile.jobs.place_jobs', ['data_jobs' => $data_jobs,'all_category' => $all_category,'about_data' =>  $about_data]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $all_category = Category::get();
        $about_data = AboutUs::first();
        $all_MyJobs = Job::where('user_id','=',Auth::User()->id)->Paginate(5);
        // dd($all_MyJops);
        $JobCategory = JobCategory::get();


        $result = Job::where('id', $id)->delete();

        if($result){

            session()->flash('success','تعم الحذف بنجاح');
            return redirect(url('user-all-jobs/'))->with(['all_MyJobs'=>$all_MyJobs,'JobCategory'=>$JobCategory,'all_category'=>$all_category,'about_data'=>$about_data]);
        }else{
            session()->flash('error','هناك خطأ ما , يرجي المحاوله مره اخري!');
            return  redirect()->back()->with(['all_MyJobs'=>$all_MyJobs,'JobCategory'=>$JobCategory,'all_category'=>$all_category,'about_data'=>$about_data]);
        }
    }
}
