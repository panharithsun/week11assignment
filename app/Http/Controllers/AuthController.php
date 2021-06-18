<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    //
    public function loginForm() {
        return view('login');
    }

    public function registerForm() {
        return view('register');
    }
    
    public function login(Request $request) {
        $userData = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($userData)) {
            return redirect(route('index'));
        } else {
            return redirect(route('loginForm'));
        }
    }

    public function register(Request $request) {
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        User::create($input);

        return redirect(route('auth.loginForm'));
    }
}
