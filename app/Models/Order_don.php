<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_don extends Model
{
    use HasFactory;
    public $table = "orders_don";

    public $fillable =['id','order_id','user_id','order_number','type','created_at','updated_at'];
    public function scopeSelection($query){
        return $query->select('id','order_id','user_id','order_number','type','created_at','updated_at');
    }
}
