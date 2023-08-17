<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

use Illuminate\Http\Request;
use App\Models\GoogleUser;
use Session;

class GoogleController extends Controller
{

public function redirectToGoogle()
{
    return Socialite::driver('google')->redirect();
}

public function handleGoogleCallback()
{
    
    $user = Socialite::driver('google')->user();

    $googleUser = GoogleUser::firstOrCreate([
        'email' => $user->getEmail(),
        'google_id' => $user->getId(),
        'name' => $user->getName(),
        'avatar' => $user->getAvatar(),
        'country' => $user->user['locale'],  // Locale contains country code
        'city' => $user->user['locale'],     // You might need to map locale to city
        'phone_number' => $user->user['phone_number'], // If you have requested permission
        'security_code' => session('securityCodeOwner'),  
    ]);

    Auth::login($googleUser);
    session()->forget('securityCodeOwner');
    session(['petOwnerCode' => $googleUser->security_code]);
    session(['petOwnerName' => $googleUser->name]);

      $message = 'Registration successful! Now you have to register your pet..You can register as many pets as you can';
     
      session()->flash('success', $message);
        return redirect()->route('pet_registration', ['token' => $googleUser->id]);
}

}
