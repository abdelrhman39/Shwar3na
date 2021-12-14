<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaceGallary extends Model
{
    public $table ="place_gallary";

    public function scopeSelection($query){
        return $query->select('id', 'place_id', 'uploads', 'type', 'created_at');
    }
}
