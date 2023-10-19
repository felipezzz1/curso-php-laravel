<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function create(){
        return view('sessions.create');
    }

    public function store(){
        $attributes = request()->validate([
            'email'=>['required','email'],
            'password'=> ['required']
        ]);

        // attempt to authenticate and log in the user
        //based on the provided credentialss
        if (! auth()->attempt($attributes)){
            //auth failed
            throw ValidationException::withMessages([
                'email' => 'Your provided credential could not be verified.'
            ]);
        }

        //session fixation
        session()->regenerate();
        // redirect with a success flash message
        return redirect('/')->with('Success', 'Welcome Back!');

        // return back()
        //     ->withInput()
        //     ->withErrors(['email' => 'Your provided credential could not be verified.']);
    }

    public function destroy(){
        auth()->logout();

        return redirect('/')->with('Success', 'Goodbye!');
    }
}
