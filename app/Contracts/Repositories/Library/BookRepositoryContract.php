<?php

namespace App\Contracts\Repositories\Library;

use App\Filters\Filter;
use App\Models\Library\Book;
use Illuminate\Pagination\LengthAwarePaginator;

interface BookRepositoryContract
{
    public function findAll(?Filter $filter = null, ?int $perPage = 25): LengthAwarePaginator;

    public function create(array $data): void;

    public function save(Book $book): void;

    public function delete(Book $book): void;

    public function findOneById(mixed $id): ?Book;
}
