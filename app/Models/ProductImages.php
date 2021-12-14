<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    public $table = "product_images";

    public function scopeSelection($query){
        return $query->select('id', 'image', 'product_id','created_at','updated_at');
    }
}
