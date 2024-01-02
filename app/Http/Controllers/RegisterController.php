<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function create()
    {

        return view('registration');
    }

    public function store()
    {
        $attributes = request()->validate([

            'name' => 'required|max: 255|unique:users,name',
            'password' => 'required|max: 255|min:7',
            'email' => 'required|email|max: 255|unique:users,email'


        ]);
        session()->flash('success', 'your account has been created successfully');

        $user = User::create($attributes);

        auth()->login($user);

        return redirect('/');
    }
}
