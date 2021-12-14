<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Controllers\Manage\BaseController;
use App\Models\ProductImages;

class ProductResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $product_listImages = array();
        $all_images = ProductImages::where('product_id', $this->id)->get();
        
        foreach($all_images as $eachimage){
            array_push($product_listImages, (object)array(
                "id" => $eachimage->id,
                "image" => BaseController::getImageUrl("products" , $eachimage->image),
                ));
        }
        
        
        return [
            "id" => $this->id, 
            "name" => $this->name,
            "description" => $this->description,
            "main_image" => BaseController::getImageUrl("products" , $this->main_image),
            "price" => $this->old_price,
            "new_price" => $this->new_price,
            "rate" => $this->rate,
            "created_at" => $this->created_at,
            "product_images" => $product_listImages,
        ];
    }
}
