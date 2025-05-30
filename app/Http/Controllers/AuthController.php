<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function registerForm()
    {
        return view('auth.singup');
    }

    public function registerstore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'img' => 'required',
        ]);

        try {
            $imgPath = null;
            if ($request->hasFile('img')) {
                $imgPath = $request->file('img')->store('users', 'public');
            }

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'img' => $imgPath,
            ]);

            return redirect()->route('login.form')->with('success', 'Signup successful! Please login.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Signup failed. Please try again.');
        }
    }

    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('blogs.index');
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.form');
    }

    public function profileshow()
    {

        return view('profile');
    }
}

