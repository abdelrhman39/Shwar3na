<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Controllers\Manage\BaseController;
use App\Models\PlaceTime;
use App\Models\City;
use App\Models\SubCity;
use App\Models\Location;
use App\Models\PlaceDiscount;
use App\Http\Resources\CopounResources;
use App\Http\Resources\GallaryResources;
use App\Http\Resources\ProductResources;
use App\Models\PlaceCategory;
use App\Models\PlaceGallary;
use App\Models\Product;

class PlaceDetailsResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $subCity_id = Location::where('id', $this->location_id)->value('subCity_id');

        $city_id = SubCity::where('id' , $subCity_id)->value('city_id');

        $place_WorkingDays = PlaceTime::Selection()->where('place_id', $this->id)->get();

        return [
            "id" => $this->id,
            "name" => $this->name_ar . " " . $this->name_en,
            "logo" => BaseController::getImageUrl("places" , $this->logo),
            "cover" => BaseController::getImageUrl("places" , $this->cover),
            "description" => $this->description,
            "phone" => $this->phone,
            "email" => $this->email,
            "address" => $this->address,
            "latitude" => $this->latitude,
            "longitude" => $this->longitude,
            "price_range" => $this->price_range,
            "website" => $this->website,
            "Facebook" => $this->Facebook,
            "Twitter" => $this->Twitter,
            "Instagram" => $this->Instagram,
            "WhatsApp" => $this->WhatsApp,
            "video" => $this->video == null ? null : BaseController::getImageUrl("places" , $this->video),
            "views" => $this->views,
            "city_id" => $city_id,
            "city_name" => City::where('id' , $city_id)->value('name'),
            "subCity_id" => $subCity_id,
            "subCity_name" => SubCity::where('id' , $subCity_id)->value('name'),
            "location_id" => $this->location_id,
            "location_name" => $this->location_name,
            "Category_id" => $this->Category_id,
            "Category_name" => $this->Category_name,
            "subCategorys" => PlaceCategory::Selection()->where('place_id' , $this->id)->get(),
            "user_id" => $this->user_id,
            "features" => $this->features,
            "state" => $this->state,
            "created_at" => $this->created_at,
            "place_WorkingDays" => $place_WorkingDays,
            "Copouns" => CopounResources::collection(PlaceDiscount::Selection()->where('place_id' , $this->id)->get()),
            "gallary" =>  GallaryResources::collection(PlaceGallary::where('place_id', $this->id)->get()),
            "products" => ProductResources::collection(Product::Selection()->where('place_id', $this->id)->get()),
        ];
    }
}
