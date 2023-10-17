<?php

namespace App\Http\Controllers\Web\Library;


use App\Models\Library\Book;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Filters\FilterFactory;
use App\Http\Controllers\Controller;
use App\Services\Library\BookService;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Web\Library\CreateRequest;
use App\Http\Requests\Web\Library\UpdateRequest;

class BookController extends Controller
{
    public function __construct(
        private readonly BookService   $bookService,
        private readonly FilterFactory $filterFactory
    )
    {
    }

    public function index(Request $request): View
    {
        $filter = $this->filterFactory->makeFromRequest($request);
        $perPage = $request->get('per_page');

        return view('books.index', ['books' => $this->bookService->findAll($filter, $perPage)]);
    }

    public function show(Book $book): View
    {
        return view('books.show', compact('book'));
    }

    public function create(CreateRequest $request): View|RedirectResponse
    {
        if ($request->isMethod('POST')) {
            $this
                ->bookService
                ->create($request->validated());

            return to_route('book.index')
                ->with('message', __('Book created.'));
        }

        return view('books.create');
    }

    public function edit(Book $book): View
    {
        return view('books.edit', compact('book'));
    }

    public function update(UpdateRequest $request, Book $book): RedirectResponse
    {
        $this
            ->bookService
            ->update($book, $request->validated());

        return to_route('book.index')
            ->with('message', __('Book updated.'));
    }

    public function delete(Request $request, mixed $id): View|RedirectResponse
    {
        $book = $this->bookService->findOne($id);
        if ($request->isMethod('DELETE')) {
            $this
                ->bookService
                ->delete($book);

            return redirect(route('book.index'))
                ->with('message', __('Book deleted.'));
        }

        return view('books.delete', compact('book'));
    }
}
