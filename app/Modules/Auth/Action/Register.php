<?php

namespace App\Modules\Auth\Action;

use App\Http\Requests\Auth\AuthRequest;
use App\Repositories\Interface\AuthRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class Register
{
    protected AuthRepositoryInterface $authRepo;

    public function __construct(AuthRepositoryInterface $authRepo)
    {
        $this->authRepo = $authRepo;
    }

    public function handle(AuthRequest $request)
    {
        $data = $request->only('name', 'email', 'password');
        $data['password'] = Hash::make($data['password']);

        $this->authRepo->create($data);

        return redirect()->route('login')->with('success', 'Pendaftaran berhasil. Silakan login.');
    }
}
