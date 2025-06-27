<?php

namespace App\Modules\Auth\Action;

use App\Http\Requests\Auth\AuthRequest;
use App\Repositories\Interface\AuthRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class Login
{
    protected AuthRepositoryInterface $authRepo;

    public function __construct(AuthRepositoryInterface $authRepo)
    {
        $this->authRepo = $authRepo;
    }

    public function handle(AuthRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['email' => 'Email atau password salah']);
    }
}
