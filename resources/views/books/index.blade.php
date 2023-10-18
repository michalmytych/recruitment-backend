@php
    $action_icons = [
        "icon:eye | color:blue | click:redirect('/books/{id}')",
        "icon:pencil | click:redirect('/books/{id}/edit')",
    ];

        /** @var \Illuminate\Support\Collection $categories */
    $category = last(array_filter(
          $categories->toArray(), fn(array $c) => $c['id'] == (integer) request()->get('value')
    ));

    /** @var \Illuminate\Pagination\LengthAwarePaginator $books */
    $booksList = array_map( function(\App\Models\Library\Book $book) {
        $book->description = shorten_auto($book->description);
        return $book->toArray();
    }, $books->items());
@endphp

<x-app-layout>
    <x-content>
        <div class="flex flex-col lg:flex-row md:flex-col sm:flex-col justify-between items-center">
            <h2 class="font-semibold text-5xl">{{ data_get($category, 'name') ?? 'Books' }}</h2>

            <div class="flex flex-col lg:flex-row md:flex-col sm:flex-col items-center">
                <div class="mb-0.5 mr-4">
                    <x-search/>
                </div>
                <div class="pt-3 pr-4 w-64">
                    <form action="{{ url()->current() }}" id="categoryFilterForm">
                        <input type="hidden" name="column" value="category_id">
                        <input type="hidden" name="operator" value="eq">
                        <x-bladewind::select
                            onselect="submitCategoryFilter"
                            placeholder="{{ __('Category') }}"
                            name="value"
                            value_key="id"
                            label_key="name"
                            selected_value="{{ request()->get('column') === 'category_id' ? request()->get('value') : null }}"
                            searchable="true"
                            :data="$categories"/>
                    </form>
                </div>
                <x-bladewind::button size="regular" onclick="window.location = '{{ route('books.create') }}';">
                    {{ __('Add new book') }}
                </x-bladewind::button>
            </div>
        </div>

        <div class="overflow-x-scroll pt-0 xl:pt-0 lg:pt-0 md:pt-4 sm:pt-4 xs:pt-4">
            @if(count($booksList))
                <x-bladewind::table
                    hover_effect="true"
                    exclude_columns="id, updated_at, description, category_id"
                    divider="thin"
                    compact="true"
                    :action_icons="$action_icons"
                    :data="$booksList"/>
            @else
                <h2 class="text-slate-600 text-lg">{{ __('No books') }}</h2>
            @endif
        </div>

        <div class="mt-4">
            {{ $books->links() }}
        </div>

    </x-content>

    <script>
        function submitCategoryFilter() {
            const categoryFilterForm = document.getElementById('categoryFilterForm');
            categoryFilterForm.submit();
        }

        function redirect(url) {
            // Before redirect actions
            window.location = url;
        }
    </script>
</x-app-layout>
