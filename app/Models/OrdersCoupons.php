<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdersCoupons extends Model
{
    use HasFactory;
    public $table = "orders_coupons";

    public $fillable =['id','discounts_id','user_id','created_at','updated_at'];
    public function scopeSelection($query){
        return $query->select('id','discounts_id','user_id','created_at','updated_at');
    }
}
