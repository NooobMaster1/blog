<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class GoogleloginController extends Controller
{

    //login with google
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {


            $user = Socialite::driver('google')->user();

            // Check if the user already exists in the database
            $existingUser = User::where('email', $user->email)->first();
            if ($existingUser) {

                // Log in the existing user
                Auth::login($existingUser);
            } else {
                // Create a new user record
                $newUser = new User();
                $newUser->name = $user->name;
                $newUser->email = $user->email;
                // add any other required fields

                $newUser->save();

                // Log in the new user
                Auth::login($newUser);
            }

            // Redirect the user to the desired page after login
            return redirect('/');
        } catch (\Throwable $th) {
            dd('something went wrong' . $th->getMessage());
        }
    }
}



