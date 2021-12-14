<?php

namespace App\Http\Controllers\Apis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiResponseTrait;
use App\Http\Controllers\Manage\BaseController;
use App\Http\Resources\CategoryResources;
use App\Models\Category;
use App\Models\SubCategory;
use carbon\carbon;

class GeneralController extends Controller
{
    use ApiResponseTrait;

    public function all_categories(Request $request){
        $lang = "ar";
        if(!auth()->User()){
            $msg = $lang == 'ar' ? " من فضلك سجل دخول" : "Token is not provided";

            return $this->apiResponseMessage( 3, $msg);
        }

        $data = Category::Selection()->get();
         
        return $this->apiResponseData( CategoryResources::collection($data), "جميع الاقسام الرئيسية");
    }

    public function subCategory_ByCatID(Request $request){
        $lang = "ar";
        if(!auth()->User()){
            $msg = $lang == 'ar' ? " من فضلك سجل دخول" : "Token is not provided";

            return $this->apiResponseMessage( 3, $msg);
        }
       
        $data = Category::where('id', $request->category_id)->first();
        
        $check = $this->not_found($data , 'القسم', 'category' , $lang);
        if( isset($check) ){
            return $check;
        }

        $data = SubCategory::Selection()->where('category_id', $request->category_id)->get();
         
        return $this->apiResponseData( $data, "الاقسام الفرعية");
    }
}
