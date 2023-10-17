<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Library\BookRepository;
use App\Contracts\Repositories\Library\BookRepositoryContract;

class RepositoryServiceProvider extends ServiceProvider
{
    public array $bindings = [
        BookRepositoryContract::class => BookRepository::class,
    ];
}
