<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Controllers\Manage\BaseController;

class PlaceResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
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
            "video" => BaseController::getImageUrl("places" , $this->video),
            "views" => $this->views,
            "location_id" => $this->location_id,
            "location_name" => $this->location_name,
            "Category_id" => $this->Category_id,
            "Category_name" => $this->Category_name,
            "user_id" => $this->user_id,
            "features" => $this->features,
            "state" => $this->state,
            "created_at" => $this->created_at,
        ];
    }
}
