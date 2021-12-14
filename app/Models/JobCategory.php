<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobCategory extends Model
{
    public $table = "job_category";


    public function scopeSelection($query){
        return  $query->selection('id', 'name', 'created_at');
    }
}
