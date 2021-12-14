<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaceDiscount extends Model
{
    public $table = "place_discounts";
    public $fillable =['id','text','title','image','code','old_price','new_price','expired_date','used','place_id','created_at'];
    public function scopeSelection($query){
        return $query->select('id', 'text', 'title', 'image', 'code', 'old_price', 'new_price', 'expired_date', 'used', 'place_id', 'created_at');
    }
}
