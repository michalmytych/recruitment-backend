<?php

namespace App\Contracts\Repositories\Library;

use Illuminate\Database\Eloquent\Collection;

interface CategoryRepositoryContract
{
    public function findAll(): Collection;
}
