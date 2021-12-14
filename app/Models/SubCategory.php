<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    public $table = "subcategory";

    public function scopeSelection($query){

        return $query->select('id', 'name', 'category_id', 'indexOf', 'created_at' );
    }
}
