<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Validator;
use Socialite;
use Exception;
use Auth;

class SocialController extends Controller
{
    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->stateless()->redirect();
    }

    public function loginWithFacebook()
    {

        try{
            $user = Socialite::driver('facebook')->stateless()->user();

            $userExisted = User::where('fb_id', $user->id)->first();
            if ($userExisted) {
                Auth::login($userExisted);
                return redirect('/profileDashboard');

            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'fb_id' => $user->id,
                    'password' => encrypt($user->id)
                ]);

                Auth::login($newUser);
                return redirect('/profileDashboard');
            }

        }catch (Exception $e){
            dd($e);
        }
    }
}
