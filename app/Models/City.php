<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public $table = "city";

    public function scopeSelection($query){
        return $query->select('id', 'name', 'created_at');
    }
}
