<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Auth;

class LoginController extends Controller
{
    
    public function getLogin(){
        return view('dashboard.auth.login');
    }

    public function Login_admin(LoginRequest $request){

        $remember_me = $request->has('remember_me') ? true : false;

        if(Auth()->guard('admin')->attempt(['email' => $request->input('email') , 'password' => $request->input('password')]) ){
            return redirect()->route('dashboard.dashboard');
        }
        return redirect()->back()->with(['error'=> 'هناك خطأ فى البيانات']);

    }
}
