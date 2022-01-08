<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamShwar3na extends Model
{
    use HasFactory;
    public $table = "team";
    protected $fillable =['id','name','title','image','description','facebook','twitter','created_at','updated_at'];
}
