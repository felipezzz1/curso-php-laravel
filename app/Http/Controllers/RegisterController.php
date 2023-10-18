<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create(){
        return view('register.create');
    }

    public function store(){
        //create the user
        var_dump(request()->all());
        // request()->validate([
        //     'name' => ['required','max:255'],
        //     'username' => ['required','max:255'],
        //     'email' => ['required','email','max:255'],
        //     'password' => ['required','min:8']
        // ]);
    }
}
