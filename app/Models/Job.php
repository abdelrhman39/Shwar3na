<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public $table = "jobs";


    public function scopeSelection($query){
        return $query->select('jobs.id', 'jobs.title','jobs.description', 'jobs.count','jobs.email' ,'jobs.end_date','jobs.type', 'jobs.image', 'jobs.requirment_job',
                                'jobs.sallary', 'jobs.is_active', 'jobs.created_at', 'jobs.updated_at');
    }
}
