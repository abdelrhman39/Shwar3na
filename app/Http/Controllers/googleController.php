<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Socialite;
use App\Models\User;
use Auth;
class googleController extends Controller
{
    CONST GOOGLE_TYPE = 'google';

    public function handleGoogleRedirect()
    {

        return Socialite::driver(static::GOOGLE_TYPE)->stateless()->redirect();
    }

    public function handleGoogleCallback()
    {

        try{
            $user = Socialite::driver(static::GOOGLE_TYPE)->stateless()->user();

            $userExisted = User::where('oauth_id', $user->id)->where('oauth_type',static::GOOGLE_TYPE)->first();
            if ($userExisted) {
                Auth::login($userExisted);
                return redirect('/profileDashboard');

            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'oauth_id' => $user->id,
                    'oauth_type' => static::GOOGLE_TYPE,
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
