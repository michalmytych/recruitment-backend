<?php

namespace App\Models\Library\Filters;

use App\Filters\CustomFilter;
use Illuminate\Database\Eloquent\Builder;

class BookSearchFilter extends CustomFilter
{
    public function applyQuery(Builder $builder, string $value): Builder
    {
        // Could be improved with ElasticSearch etc.
        return $builder
            ->where('title', 'LIKE', '%'.$value.'%')
            ->orWhere('author', 'LIKE', '%'.$value.'%');
    }
}
