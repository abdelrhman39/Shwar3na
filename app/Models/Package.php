<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    public $table = 'packages';

    public function scopeSelection($query){

        return $query->select('id', 'name', 'title', 'price', 'discount','created_at' );
    }
}
