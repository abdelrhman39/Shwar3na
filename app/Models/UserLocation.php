<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserLocation extends Model
{
    public $table = "user_locations";

    public function scopeSelection($query){

        return $query->select('id', 'name', 'address', 'Latitude', 'Longitude', 'floar_num', 'Apartment_num', 'details', 'user_id','created_at' );
    }
}
