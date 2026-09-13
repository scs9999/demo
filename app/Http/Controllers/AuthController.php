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
        $data = $request->validated();
        $data['password'] = bcrypt($data['password']);
        User::create($data);

        return redirect('/login');
    }

    public function showLogin()
    {
        return view('login');
    }

    public function login(LoginRequest $request)
    {
        if (!Auth::attempt($request->validated())) {
            return back()->withErrors(['login' => 'Неверный логин или пароль']);
        }

        if (auth()->user()->is_admin) {
            return redirect('/admin/dashboard');
        }

        return redirect('/bookings');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
