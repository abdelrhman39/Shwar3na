<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $table = "products";

    public function scopeSelection($query){
        return $query->select('id', 'name', 'description','main_image','old_price','new_price','rate','place_id','Equip','is_active','created_at','updated_at');
    }
}
