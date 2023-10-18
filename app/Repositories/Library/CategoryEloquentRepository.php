<?php

namespace App\Repositories\Library;

use App\Models\Library\Category;
use Illuminate\Database\Eloquent\Collection;
use App\Contracts\Repositories\Library\CategoryRepositoryContract;

readonly class CategoryEloquentRepository implements CategoryRepositoryContract
{
    public function __construct(private Category $model) {}

    /**
     * Find categories by filters, paginate result by perPage.
     *
     * @return Collection
     */
    public function findAll(): Collection
    {
        return $this
            ->model
            ->query()
            ->latest()
            ->get();
    }
}
