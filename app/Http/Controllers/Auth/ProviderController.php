<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    //
    public function redirect($provider){
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider){
        $socialUser = Socialite::driver($provider)->user();
        $user = User::updateOrCreate([
            'provider_id' => $socialUser->id,
            'provider' => $provider
        ], [
            'name' => $socialUser->name,
            'username' => $socialUser->nickname,
            'email' => $socialUser->email,
            'avatar' => $socialUser->avatar,
            'provider_token' => $socialUser->token,
        ]);
     
        Auth::login($user);
     
        return redirect('/pesertadidik');
    }
}
