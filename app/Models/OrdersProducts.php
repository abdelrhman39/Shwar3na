<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdersProducts extends Model
{
    use HasFactory;
    public $table = "orders_products";

    public $fillable =['id','product_id','user_id','quantity','created_at','updated_at'];
    public function scopeSelection($query){
        return $query->select('id','product_id','user_id','quantity','created_at','updated_at');
    }
}
