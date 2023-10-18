<?php

namespace App\Repositories\Library;

use App\Filters\Filter;
use App\Models\Library\Book;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Contracts\Repositories\Library\BookRepositoryContract;

readonly class BookEloquentRepository implements BookRepositoryContract
{
    public function __construct(private Book $model) {}

    /**
     * Find books by filters, paginate result by perPage.
     *
     * @param null|Filter $filter  Query filter
     * @param int|null    $perPage Pagination items per page
     *
     * @return LengthAwarePaginator
     */
    public function findAll(?Filter $filter = null, ?int $perPage = null): LengthAwarePaginator
    {
        return $this
            ->model
            ->load('category')
            ->query()
            ->latest()
            ->applyFilter($filter)
            ->paginate($perPage ?? 25);
    }

    public function create(array $data): void
    {
        $this->model->fill($data)->save();
    }

    public function save(Book $book, array $data): void
    {
        $book->fill($data);
        $book->save();
    }

    public function delete(Book $book): void
    {
        $book->delete();
    }

    public function findOneById(mixed $id): ?Book
    {
        return $this->model->with('category')->find($id);
    }
}
