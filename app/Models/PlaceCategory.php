<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaceCategory extends Model
{
    public $table = "place_category";

    public function scopeSelection($query){
        return $query->select('place_category.id', 'place_category.subcat_id' , 'subcategory.name as subCategory_name', 'place_category.place_id')
                        ->join('subcategory' ,'place_category.subcat_id' ,'=', 'subcategory.id');
    }
}
