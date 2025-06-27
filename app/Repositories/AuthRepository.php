<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interface\AuthRepositoryInterface;

class AuthRepository implements AuthRepositoryInterface
{
    public function create(array $data)
    {
        return User::create($data);
    }
}
