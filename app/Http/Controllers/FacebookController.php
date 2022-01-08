<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Socialite;
use App\Models\User;
use Auth;
class FacebookController extends Controller
{
    CONST FACEBOOK_TYPE = 'facebook';

    public function handleFacebookRedirect()
    {

        return Socialite::driver(static::FACEBOOK_TYPE)->stateless()->redirect();
    }

    public function handleFacebookCallback()
    {

        try{
            $user = Socialite::driver(static::FACEBOOK_TYPE)->stateless()->user();

            $userExisted = User::where('oauth_id', $user->id)->where('oauth_type',static::FACEBOOK_TYPE)->first();
            if ($userExisted) {
                Auth::login($userExisted);
                return redirect('/profileDashboard');

            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'oauth_id' => $user->id,
                    'oauth_type' => static::FACEBOOK_TYPE,
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
