<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    public function create(){
        return view('register');
    }
    public function store(){
        // dd("hello");
        $validated = request()->validate([
            'username' => ['required', 'string','min:4', 'max:255', 'unique:users'],
            'name' => ['required', 'string','min:4', 'max:255'],
            'password' => ['required', 'digits:4', 'numeric', 'confirmed'],
            'phone' => ['nullable', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:255'],
            'birthdate' => ['nullable', 'date'],
        ]);
        $validated['password'] = Hash::make($validated['password']);
        // dd($validated);
        User::create($validated);
        return redirect('/register')->with('status', 'Registration successful! Please log in.');
    }
}
