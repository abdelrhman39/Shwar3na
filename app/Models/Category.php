<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $table = "category";

    public function scopeSelection($query){

        return $query->select('id', 'name' , 'image', 'created_at');
    }
}
