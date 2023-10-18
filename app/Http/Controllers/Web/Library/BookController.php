<?php

namespace App\Http\Controllers\Web\Library;


use App\Filters\FilterFactory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Common\Library\CreateRequest;
use App\Http\Requests\Common\Library\UpdateRequest;
use App\Models\Library\Book;
use App\Services\Library\BookService;
use App\Services\Library\CategoryService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BookController extends Controller
{
    public function __construct(
        private readonly BookService     $bookService,
        private readonly FilterFactory   $filterFactory,
        private readonly CategoryService $categoryService
    )
    {
    }

    public function index(Request $request): View
    {
        $filter = $this->filterFactory->makeFromRequest($request);
        $perPage = $request->get('per_page');

        return view('books.index', [
            'categories' => $this->categoryService->findAll(),
            'books' => $this->bookService->findAll($filter, $perPage)
        ]);
    }

    public function show(Book $book): View
    {
        return view('books.show', compact('book'));
    }

    public function create(): View|RedirectResponse
    {
        $categories = $this->categoryService->findAll();

        return view('books.create', compact('categories'));
    }

    public function store(CreateRequest $request): RedirectResponse
    {
        $this
            ->bookService
            ->create($request->validated());

        return to_route('books.index')
            ->with('message', __('Book created.'));
    }

    public function edit(Book $book): View
    {
        $categories = $this->categoryService->findAll();

        return view('books.edit', compact('book', 'categories'));
    }

    public function update(UpdateRequest $request, Book $book): RedirectResponse
    {
        $this
            ->bookService
            ->update($book, $request->validated());

        return to_route('books.index')
            ->with('message', __('Book updated.'));
    }

    public function destroy(Request $request, mixed $id): View|RedirectResponse
    {
        $book = $this->bookService->findOne($id);
        if ($request->isMethod('DELETE')) {
            $this
                ->bookService
                ->delete($book);

            return to_route('books.index')
                ->with('message', __('Book deleted.'));
        }

        return view('books.delete', compact('book'));
    }
}
