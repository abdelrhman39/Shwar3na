<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Manage\BaseController;
use App\Models\User;
use App\Models\UserRole;
use carbon\carbon;

class UserController extends Controller
{
    public function Users_page(){
        
        $data = User::select('users.id', 'users.name', 'users.email', 'users.phone', 'users.image', 'users.created_at')
                    ->join('user_roles' , 'users.id' ,'=', 'user_roles.user_id')
                    ->where('user_roles.type', 2)->get();

        return view('dashboard.Users.show',  ['data' => $data]);
    }
    
    

}
