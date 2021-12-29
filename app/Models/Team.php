<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    public $table = "team";

    protected $fillable =['id','name','image','title','facebook','twitter','created_at','updated_at'];
}
