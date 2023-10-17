<?php

namespace App\Services\Library;

use App\Filters\Filter;
use App\Models\Library\Book;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Contracts\Repositories\Library\BookRepositoryContract;

readonly class BookService
{
    public function __construct(private BookRepositoryContract $bookRepository)
    {
    }

    /**
     * Find books.
     *
     * @param null|Filter $filter Query filter
     * @param int|null $perPage Pagination items per page
     *
     * @return LengthAwarePaginator
     */
    public function findAll(?Filter $filter = null, ?int $perPage = null): LengthAwarePaginator
    {
        return $this->bookRepository->findAll($filter, $perPage);
    }

    public function create(array $data): void
    {
        $this->bookRepository->create($data);
    }

    public function update(Book $book, array $data): void
    {
        $book->fill($data);
        $this->bookRepository->save($book);
    }

    public function delete(Book $book): void
    {
        $this->bookRepository->delete($book);
    }

    public function findOne(mixed $id): ?Book
    {
        return $this->bookRepository->findOneById($id);
    }
}
