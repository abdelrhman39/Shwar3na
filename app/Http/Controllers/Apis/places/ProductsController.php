<?php

namespace App\Http\Controllers\Apis\places;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiResponseTrait;
use App\Http\Controllers\Manage\BaseController;
use App\Http\Resources\ProductResources;
use Validator,Auth,Artisan,Hash,File,Crypt;
use carbon\carbon;
use App\Models\User;
use App\Models\Place;
use App\Models\Product;
use App\Models\ProductImages;

class ProductsController extends Controller
{
    use ApiResponseTrait;

    public function add_product(Request $request){
        $lang = "ar";
        if(!auth()->User()){
            $msg = $lang == 'ar' ? " من فضلك سجل دخول" : "Token is not provided";

            return $this->apiResponseMessage( 3, $msg);
        }
        $created_at = carbon::now()->toDateTimeString();
        $dateTime = date('Y-m-d H:i:s',strtotime('+2 hours',strtotime($created_at)));
       
        $input = $request->all();

        $validationMessages = [
            'name.required' => 'أسم المنتج مطلوب',
            'description.required' => 'وصف المنتج مطلوب',
            'price.required' => 'سعر المنتج مطلوب',
            'main_image.required' => 'صوره للمنتج مطلوبه' ,
        ];
        $validator = Validator::make($input, [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'main_image' => 'required',

        ], $validationMessages);

        if ($validator->fails()) {
            return $this->apiResponseMessage(0,$validator->messages()->first(), 200);
        }
         
        if($request->images == null || $request->images ==  "" ){
            return $this->apiResponseMessage( 2 , "من فضلك أختر الصور أولا");
        }
        
        $add =  new Product;
        $add->name = $request->name;
        $add->description = $request->description;
        $add->main_image = $request->file('main_image') ? BaseController::saveImage("products" , $request->file('main_image')) : "img.png";
        $add->old_price = $request->price;
        $add->new_price = $request->new_price;
        $add->rate = 0;
        $add->place_id = $request->place_id ;
        $add->is_active = 1;
        $add->created_at = $dateTime;
        $add->save();

        $data = Product::selection()->where('id', $add->id)->first();



       

        if ($request->hasfile('images')) {
            $all_images = $request->file('images');

            foreach($all_images as $image) {
                $imageName = BaseController::saveImage("products" , $image);

                $proImags =  new ProductImages;
                $proImags->image = $imageName;
                $proImags->product_id = $add->id;
                $proImags->created_at = $dateTime;
                $proImags->save();

            }
        }

        return $this->apiResponseData( ProductResources::make($data) ,"تم أضافة المنتج بنجاح" ); 

    }


    public function product_active(Request $request){
        $lang = "ar";
        if(!auth()->User()){
            $msg = $lang == 'ar' ? " من فضلك سجل دخول" : "Token is not provided";

            return $this->apiResponseMessage( 3, $msg);
        }
        $created_at = carbon::now()->toDateTimeString();
        $dateTime = date('Y-m-d H:i:s',strtotime('+2 hours',strtotime($created_at)));
       
        $get_data = Product::where('id', $request->product_id)->value('is_active');

        if( $get_data == 1){
            $active = 0;
            $msgs = "تم أخفاء المنتج بنجاح";
        }else{
            $active = 1;
            $msgs = "تم أظهار المنتج بنجاح";
        }
        $update = Product::where('id', $request->product_id)->update(['is_active' => $active , 'updated_at' => $dateTime]);

        return $this->apiResponseMessage( 1, $msgs);
    }


    public function place_products(Request $request ){
        $lang = "ar";
        if(!auth()->User()){
            $msg = $lang == 'ar' ? " من فضلك سجل دخول" : "Token is not provided";

            return $this->apiResponseMessage( 3, $msg);
        }

        $data = Product::selection()->where([['place_id', $request->place_id], ['is_active' , 1]])->get();
        return $this->apiResponseData( ProductResources::collection($data) ," جميع منتجات المحل" ); 

    }

    public function show_productByID(Request $request ){
        $lang = "ar";
        if(!auth()->User()){
            $msg = $lang == 'ar' ? " من فضلك سجل دخول" : "Token is not provided";

            return $this->apiResponseMessage( 3, $msg);
        }

        $data = Product::selection()->where('id', $request->product_id)->first();
        return $this->apiResponseData( ProductResources::make($data) ," بيانات المنتج" ); 

    }


    public function update_productData(Request $request){
        $lang = "ar";
        if(!auth()->User()){
            $msg = $lang == 'ar' ? " من فضلك سجل دخول" : "Token is not provided";

            return $this->apiResponseMessage( 3, $msg);
        }

        $data = Product::selection()->where('id', $request->product_id)->first();    
    
        $check = $this->not_found($data, 'منتج', 'product', 'ar');

        if($data == null){
            return $check;
        }
        $created_at = carbon::now()->toDateTimeString();
        $dateTime = date('Y-m-d H:i:s',strtotime('+2 hours',strtotime($created_at)));
       
        $name = $request->has('name') && $request->name != null ? $request->name : $data->name;
        $description = $request->has('description') && $request->description != null ? $request->description : $data->description;
        $old_price = $request->has('price') && $request->price != null ? $request->price : $data->old_price;
        $new_price = $request->has('new_price') && $request->new_price != null ? $request->new_price : $data->new_price;
        $main_image =   $request->file('main_image') ? BaseController::saveImage("products" , $request->file('main_image')) : $data->main_image;
        

        $updateData = Product::where('id' , $request->product_id)->update([
                                                                        "name" => $name,
                                                                        "description" => $description,
                                                                        "old_price" => $old_price,
                                                                        "new_price" => $new_price,
                                                                        "main_image" => $main_image,
                                                                        "updated_at" => $dateTime,
                                                                    ]);

        $data = Product::selection()->where('id', $request->product_id)->first();

        return $this->apiResponseData( ProductResources::make($data) ,"تم تعديل المنتج بنجاح" ); 
                                                            
    }
    
    
    public function delete_productImage(Request $request){
        $lang = "ar";
        if(!auth()->User()){
            $msg = $lang == 'ar' ? " من فضلك سجل دخول" : "Token is not provided";

            return $this->apiResponseMessage( 3, $msg);
        }
        
        $deleteImage = ProductImages::where('id', $request->image_id)->delete();
        
        return $this->apiResponseMessage( 1 ,"تم مسح الصوره بنجاح" ); 

    }
    
 
    public function add_productImage(Request $request){
        $lang = "ar";
        if(!auth()->User()){
            $msg = $lang == 'ar' ? " من فضلك سجل دخول" : "Token is not provided";

            return $this->apiResponseMessage( 3, $msg);
        }
        
        $created_at = carbon::now()->toDateTimeString();
        $dateTime = date('Y-m-d H:i:s',strtotime('+2 hours',strtotime($created_at)));
       
       
        $proImags =  new ProductImages;
        $proImags->image = BaseController::saveImage("products" , $request->file('image'));
        $proImags->product_id = $request->product_id;
        $proImags->created_at = $dateTime;
        $proImags->save();
                
                
        return $this->apiResponseMessage( 1 ,"تم أضافة الصوره بنجاح" ); 

    }
 
 
    
    
}
