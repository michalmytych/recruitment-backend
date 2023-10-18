<?php

namespace App\Contracts\Repositories\User;

use App\Models\User;

interface UserRepositoryContract
{
    public function create(array $data): User;

    public function firstWhere(array $attributes);
}
