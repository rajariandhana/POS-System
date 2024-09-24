<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
class SessionController extends Controller
{
    public function create(){
        return view('login');
    }
    public function store(){
        $validated = request()->validate([
            'username'=>['required'],
            'password'=>['required'],
        ]);
        // dd($validated);

        if(!Auth::attempt($validated)){
            throw ValidationException::withMessages([
                'username'=>'Sorry, those credentials do not match'
                // 'password'=>'Sorry, those credentials do not match'
            ]);
        }
        request()->session()->regenerate();
        return redirect('/');

    }
    public function destroy(){
        // dd("hit");
        Auth::logout();
        return redirect('/');
    }
}
