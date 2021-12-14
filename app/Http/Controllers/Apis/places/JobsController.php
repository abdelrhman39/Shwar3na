<?php

namespace App\Http\Controllers\Apis\places;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiResponseTrait;
use App\Http\Controllers\Manage\BaseController;
use Validator,Auth,Artisan,Hash,File,Crypt;
use App\Http\Resources\JobResources;
use carbon\carbon;
use App\Models\User;
use App\Models\JobCategory;
use App\Models\Job;

class JobsController extends Controller
{
    
    use ApiResponseTrait;

    public function user_jobs(Request $request){
        $lang = "ar";
        if(!auth()->User()){
            $msg = $lang == 'ar' ? " من فضلك سجل دخول" : "Token is not provided";

            return $this->apiResponseMessage( 3, $msg);
        }

        $data = Job::Selection()->where([['user_id',  auth()->User()->id] , ['is_active' , 'accept']])->get();
        return $this->apiResponseData(  JobResources::collection($data), "  جميع الوظائف لديك" ); 

    }


    public function add_job(Request $request){
        $lang = "ar";
        if(!auth()->User()){
            $msg = $lang == 'ar' ? " من فضلك سجل دخول" : "Token is not provided";

            return $this->apiResponseMessage( 3, $msg);
        }

        $created_at = carbon::now()->toDateTimeString();
        $dateTime = date('Y-m-d H:i:s',strtotime('+2 hours',strtotime($created_at)));
       
        $input = $request->all();

        $validationMessages = [
            'title.required' => 'المسمى الوظيفى مطلوب',
            'description.required' => 'وصف الوظيفة مطلوب',
            'count.required' => 'عدد الوظائف المفتوحة مطلوب',
            'image.required' => 'الصورة  مطلوبه' ,
            'end_date.required' => 'تاريخ انتهاءالوظيفة مطلوب',
            'type.required' => 'نوع الوظيفة مطلوب',
            'requirment_job.required' => 'أشتراطات الوظيفة مطلوبة',
            // 'jobCat_id.required' => 'قسم الوظيفة مطلوب',
            'sallary.required' => 'الراتب مطلوب',
        ];
        $validator = Validator::make($input, [
            'title' => 'required',
            'description' => 'required',
            'count' => 'required',
            'image' => 'required',
            'end_date' => 'required',
            'type' => 'required',
            'requirment_job' => 'required',
            'sallary' => 'required',
        ], $validationMessages);

        if ($validator->fails()) {
            return $this->apiResponseMessage(0,$validator->messages()->first(), 200);
        }


        $add =  new Job;
        $add->title = $request->title;
        $add->description = $request->description;
        $add->count = $request->count;
        $add->email = $request->email;
        $add->image = $request->file('image') ? BaseController::saveImage("jobs" , $request->file('image')) : "img.png";
        $add->end_date = $request->end_date;
        $add->type = $request->type;
        $add->requirment_job = $request->requirment_job;
        $add->sallary = $request->sallary;
        $add->is_active = "accept";
        $add->user_id = auth()->User()->id;
        $add->created_at = $dateTime;
        $add->save();

        $data = Job::Selection()->where('id', $add->id)->first();
        return $this->apiResponseData( JobResources::make($data) ," تم أضافة وظيف بنجاح" ); 
 
    }



    public function delete_job(Request $request){
        $lang = "ar";
        if(!auth()->User()){
            $msg = $lang == 'ar' ? " من فضلك سجل دخول" : "Token is not provided";

            return $this->apiResponseMessage( 3, $msg);
        }

        $delete = Job::where('id' , $request->job_id)->delete();
        return $this->apiResponseMessage( 1 , "تم مسح الوظيفه بنجاح");
 
    }

}
