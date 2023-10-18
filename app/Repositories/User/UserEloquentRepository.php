<?php

namespace App\Repositories\User;

use App\Models\User;
use App\Contracts\Repositories\User\UserRepositoryContract;

class UserEloquentRepository implements UserRepositoryContract
{
    public function create(array $data): User
    {
        return User::create($data);
    }

    public function firstWhere(array $attributes): ?User
    {
        return User::firstWhere($attributes);
    }
}
