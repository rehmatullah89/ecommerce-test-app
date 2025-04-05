<?php

namespace App\Repositories;

use App\Models\User;
use App\Interfaces\Repositories\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    public function create(array $data) {
        return User::create($data);
    }

    public function findByEmail(string $email) {
        return User::where('email', $email)->first();
    }
}
