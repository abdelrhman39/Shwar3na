<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaceTags extends Model
{
    use HasFactory;
    public $table ="place_tags";

    public function scopeSelection($query){
        return $query->select('id', 'text' , 'place_id', 'created_at');
    }
}
