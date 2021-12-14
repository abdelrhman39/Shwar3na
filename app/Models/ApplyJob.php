<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplyJob extends Model
{
    use HasFactory;
    public $table = "apply_job";

    protected $fillable =['id','job_id','user_id','created_at','updated_at'];
    public function scopeSelection($query){
        return $query->select('apply_job.id','apply_job.job_id','apply_job.user_id',
         'apply_job.created_at', 'apply_job.updated_at');
    }
}
