<?php

namespace App\Http\Controllers\Api\Library;

use App\Filters\FilterFactory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Library\CreateRequest;
use App\Http\Requests\Web\Library\UpdateRequest;
use App\Models\Library\Book;
use App\Services\Library\BookService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BookController extends Controller
{
    public function __construct(
        private readonly FilterFactory $filterFactory,
        private readonly BookService   $bookService
    )
    {
    }

    public function index(Request $request): JsonResponse
    {
        $filter = $this->filterFactory->makeFromRequest($request);
        $perPage = $request->get('per_page');

        return response()->json([
            'data' => $this->bookService->findAll($filter, $perPage)
        ]);
    }

    public function show(Book $book): JsonResponse
    {
        return response()->json(['data' => $book]);
    }

    public function create(CreateRequest $request): JsonResponse
    {
        $this
            ->bookService
            ->create($request->validated());

        return response()->json(['message' => 'Created.'], 201);
    }

    public function update(UpdateRequest $request, Book $book): JsonResponse
    {
        $this
            ->bookService
            ->update($book, $request->validated());

        return response()->json(['message' => 'Updated.']);
    }

    public function delete(Book $book): JsonResponse
    {
        $this->bookService->delete($book);

        return response()->json(['message' => 'Deleted.'], 203);
    }
}
