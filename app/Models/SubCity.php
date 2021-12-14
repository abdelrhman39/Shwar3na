<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCity extends Model
{
    public $table = "subcity";

    public function scopeSelection($query){

        return $query->select('id', 'name' ,'city_id', 'created_at');
    }
}
