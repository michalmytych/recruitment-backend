<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

abstract class CustomFilter
{
    abstract public function applyQuery(Builder $builder, string $value): Builder;
}
