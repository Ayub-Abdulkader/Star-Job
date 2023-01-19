<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function register()
    {
        return view('user.create');
    }

    public function store()
    {
        $validated = request()->validate([
            'name' => 'required|min:3|max:255|unique:users,name',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:7|max:255',
        ]);

        $user = User::create($validated);

        auth()->login($user);
        return redirect()->route('jobs.index')->with('success', 'Account created successfully');  
    }

    public function create()
    {
        return view('user.login');
    }

    public function login()
    {
        $attributes = request()->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|min:7|max:255',
        ]);

        if (auth()->attempt($attributes)) {
            return redirect()->route('jobs.index')->with('success', 'Welcome back!');
        }

        return back()
            ->withInput()
            ->withErrors([
                'email' => 'invalid email or password',
            ]);
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('jobs.index')->with('success', 'see ya!'); 
    }
}
