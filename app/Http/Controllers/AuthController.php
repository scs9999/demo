<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('register');
    }

    public function register(RegisterRequest $request)
    {
        User::create($request->validated());

        return redirect('/login');
    }

    public function showLogin()
    {
        return view('login');
    }

    public function login(LoginRequest $request)
    {
        $user = User::where('login', $request->login)
            ->where('password', $request->password)
            ->first();

        if (!$user) {
            return back()->withErrors(['login' => 'Неверный логин или пароль']);
        }

        Auth::login($user);

        return redirect('/');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
