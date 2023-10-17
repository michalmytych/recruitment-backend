<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Library\BookRepository;
use App\Repositories\Library\CategoryRepository;
use App\Contracts\Repositories\Library\BookRepositoryContract;
use App\Contracts\Repositories\Library\CategoryRepositoryContract;

class RepositoryServiceProvider extends ServiceProvider
{
    public array $bindings = [
        BookRepositoryContract::class => BookRepository::class,
        CategoryRepositoryContract::class => CategoryRepository::class
    ];
}
