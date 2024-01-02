<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{


    public function create()
    {
        return view('login');
    }
    public function store()
    {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);


        if (auth()->attempt($attributes)) {

            session()->regenerate();

            return redirect('/')->with('success', 'welcome back!');
        }
        return back()->withInput()->withErrors([
            'email' => 'email was not verified'
        ]);
    }


    public function destroy()
    {

        auth()->logout();
        return redirect('/')->with('success', 'Goodbye!');
    }
}
