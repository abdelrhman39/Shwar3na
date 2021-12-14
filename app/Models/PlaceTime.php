<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaceTime extends Model
{
    public $table = "place_time";

    public function scopeSelection($query){
        return $query->select('id' , 'date_ar','date_en','date_id' , 'timeFrom', 'timeTo' , 'place_id', 'created_at');
    }
}
