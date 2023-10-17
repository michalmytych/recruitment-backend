<?php

namespace App\Filters\Traits;

use App\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

trait Filterable
{
    public function scopeApplyFilter(Builder $builder, ?Filter $filter = null): Builder
    {
        if (!$filter) {
            return $builder;
        }

        return $filter->applyOnQuery($builder);
    }

    protected static function getCustomFilters(): array
    {
        return [];
    }

    abstract static function getFilterableColumns(): array;
}
