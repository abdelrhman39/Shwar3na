<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageDetails extends Model
{
    public $table = "package_details";


    public function scopeSelection($query){

        return $query->select('id', 'text', 'package_id','created_at', 'updated_at' );
    }
}
