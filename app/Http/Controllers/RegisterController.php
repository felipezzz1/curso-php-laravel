<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create(){
        return view('register.create');
    }

    public function store(){
        //create the user
        $attributes = request()->validate([
            'name' => ['required','max:255'],
            'username' => ['required','min:3','max:255', 'unique:users,username'],
            'email' => ['required','email','max:255', 'unique:users,email'],
            'password' => ['required','min:8']
        ]);

        $user = User::create($attributes);

        //login

        auth()->login($user);

        return redirect('/')->with('Success', 'Your account has been created.');
    }
}
