<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\SubCity;
use App\Models\Location;

class CityLocationsResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $data = array();
        $all_subCity = SubCity::Selection()->where('city_id' , $this->id)->get();

        foreach($all_subCity as $each){
            $all_locations = Location::Selection()->where('subCity_id' , $each->id)->get();
            
            array_push($data, (object)array(
                "subCity_id" => $each->id,
                "subCity_name" => $each->name,
                "Locations" => $all_locations,
            ));
        }

        return [
            "city_id" => $this->id,
            "city_name" => $this->name,
            "SubCity" => $data,
        ];
    }
}
