<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Library\BookEloquentRepository;
use App\Repositories\Library\CategoryEloquentRepository;
use App\Repositories\User\UserEloquentRepository;
use App\Contracts\Repositories\User\UserRepositoryContract;
use App\Contracts\Repositories\Library\BookRepositoryContract;
use App\Contracts\Repositories\Library\CategoryRepositoryContract;

class RepositoryServiceProvider extends ServiceProvider
{
    public array $bindings = [
        BookRepositoryContract::class => BookEloquentRepository::class,
        UserRepositoryContract::class => UserEloquentRepository::class,
        CategoryRepositoryContract::class => CategoryEloquentRepository::class
    ];
}
