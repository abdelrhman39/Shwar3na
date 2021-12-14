<?php

namespace App\Http\Controllers\Apis\places;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiResponseTrait;
use App\Http\Controllers\Manage\BaseController;
use App\Models\Place;
use App\Models\User;
use carbon\carbon;
use App\Models\PlaceDiscount;
use App\Http\Resources\CopounResources;
use Validator;

class CopounController extends Controller
{
    use ApiResponseTrait;

    public function place_copouns(Request $request){
        $lang = "ar";
        if(!auth()->User()){
            $msg = $lang == 'ar' ? " من فضلك سجل دخول" : "Token is not provided";

            return $this->apiResponseMessage( 3, $msg);
        }

        $data = PlaceDiscount::Selection()->where('place_id' , $request->place_id)->get();
        return $this->apiResponseData( CopounResources::collection($data) ,"كوبونات المحل" ); 

    }

    public function destroy_copoun(Request $request){
        $lang = "ar";
        if(!auth()->User()){
            $msg = $lang == 'ar' ? " من فضلك سجل دخول" : "Token is not provided";

            return $this->apiResponseMessage( 3, $msg);
        }

        $delete = PlaceDiscount::where('id', $request->copoun_id)->delete();
        
        $msg = $lang == 'ar' ?  "تم مسح الكوبون بنجاح" : "Copoun is deleted successfully";
        return $this->apiResponseMessage( 1, $msg);

    }

    public function add_copoun(Request $request){
        $lang = "ar";
        if(!auth()->User()){
            $msg = $lang == 'ar' ? " من فضلك سجل دخول" : "Token is not provided";

            return $this->apiResponseMessage( 3, $msg);
        }
        $input = $request->all();

        $validationMessages = [
            'title.required' => 'أسم العرض مطلوب',
            'text.required' => 'عنوان العرض مطلوبه',
            // 'code.required' => 'الرمز مطلوب',
            'expired_date.required' => 'تاريخ أنتهاء العرض مطلوب' ,
            'old_price.min' =>   'السعر قبل الخصم مطلوب' ,
            'new_price.required' =>  'السعر بعد الخص مطلوب' 
        ];
 
        $validator = Validator::make($input, [
            'title' => 'required',
            'text' => 'required',
            // 'code' => 'required',
            'expired_date' => 'required',
            'old_price' => 'required',
            'new_price' => 'required'

        ], $validationMessages);

        if ($validator->fails()) {
            return $this->apiResponseMessage(0,$validator->messages()->first(), 200);
        }
        $created_at = carbon::now()->toDateTimeString();
        $dateTime = date('Y-m-d H:i:s',strtotime('+2 hours',strtotime($created_at)));
        
        $add =  new PlaceDiscount;
        $add->title = $request->title;
        $add->text = $request->text;
        $add->image =  $request->file('image') ? BaseController::saveImage("places" , $request->file('image')) : null;
        $add->code = $request->code;
        $add->expired_date = $request->expired_date;
        $add->old_price = $request->old_price;
        $add->new_price = $request->new_price;
        $add->used = 0;
        $add->place_id = $request->place_id;
        $add->created_at = $dateTime;
        $add->save();
      
        $msg = $lang == 'ar' ?  "تم أضافة الكوبون بنجاح" : "Copoun is inserted successfully";
        return $this->apiResponseMessage( 1, $msg);
    }

    public function place_copounsByID(Request $request){
        $lang = "ar";
        if(!auth()->User()){
            $msg = $lang == 'ar' ? " من فضلك سجل دخول" : "Token is not provided";

            return $this->apiResponseMessage( 3, $msg);
        }

        $data = PlaceDiscount::Selection()->where('id' , $request->copoun_id)->first();
        return $this->apiResponseData( CopounResources::make($data) ,"كوبونات المحل" ); 

    }

    public function update_copouns(Request $request){
        $lang = "ar";
        if(!auth()->User()){
            $msg = $lang == 'ar' ? " من فضلك سجل دخول" : "Token is not provided";

            return $this->apiResponseMessage( 3, $msg);
        }
        $created_at = carbon::now()->toDateTimeString();
        $dateTime = date('Y-m-d H:i:s',strtotime('+2 hours',strtotime($created_at)));
        
        $copounImage = PlaceDiscount::where('id', $request->copoun_id)->value('image');
        
        $data = PlaceDiscount::where('id' , $request->copoun_id)->update([
            "title" => $request->title,
            "text" => $request->text,
            "image" => $request->file('image') ? BaseController::saveImage("places" , $request->file('image')) : $copounImage,
            "code" => $request->code,
            "expired_date" => $request->expired_date,
            "old_price" => $request->old_price,
            "new_price" => $request->new_price,
            "updated_at" => $dateTime,
        ]);
        return $this->apiResponseData( CopounResources::make( PlaceDiscount::where('id' , $request->copoun_id)->first()) ,"كوبونات المحل" ); 

    }

}
