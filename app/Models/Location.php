<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public $table = "locations";

    public function scopeSelection($query){

        return $query->select('id', 'name' ,'subCity_id', 'created_at');
    }
}
