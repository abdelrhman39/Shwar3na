<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends  Authenticatable {

    use Notifiable;

    public $table = "admins";

    protected $fillable = [
        'name', 'email', 'image','password', 'created_at', 'updated_at',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
