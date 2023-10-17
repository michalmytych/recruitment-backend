<?php

namespace App\Services\Library;

use Illuminate\Database\Eloquent\Collection;
use App\Contracts\Repositories\Library\CategoryRepositoryContract;

readonly class CategoryService
{
    public function __construct(private CategoryRepositoryContract $repositoryContract)
    {
    }

    public function findAll(): Collection
    {
        return $this->repositoryContract->findAll();
    }
}
