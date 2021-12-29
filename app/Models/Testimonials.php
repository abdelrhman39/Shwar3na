<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonials extends Model
{
    use HasFactory;
    public $table = "testimonials";

    protected $fillable =['id','user_id','is_active','comment','created_at','updated_at'];
}
