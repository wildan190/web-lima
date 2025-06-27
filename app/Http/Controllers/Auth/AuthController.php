<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthRequest;
use App\Modules\Auth\Action\Login;
use App\Modules\Auth\Action\Register;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(AuthRequest $request, Login $action)
    {
        return $action->handle($request);
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(AuthRequest $request, Register $action)
    {
        return $action->handle($request);
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('login');
    }
}
