@php
    $action_icons = [
        "icon:eye | color:blue | click:redirect('/books/{id}')",
        "icon:pencil | click:redirect('/books/{id}/edit')",
    ];

    /** @var \Illuminate\Pagination\LengthAwarePaginator $books */
    $booksList = array_map( function(\App\Models\Library\Book $book) {
        $book->description = shorten_auto($book->description);
        return $book->toArray();
    }, $books->items());
@endphp

<x-app-layout>
    <x-content>
        <div class="flex flex-col lg:flex-row md:flex-col sm:flex-col xs:flex-col justify-between mb-3 items-center">
            <h2 class="font-semibold text-3xl">{{ __('Books') }}</h2>
            <div class="flex flex-col lg:flex-row md:flex-col sm:flex-col xs:flex-col items-center">
                <div class="mb-0.5 mr-4 pb-2 lg:pb-0 md:pb-2 sm:pb-2">
                    <x-search/>
                </div>
                <x-bladewind::button size="small" onclick="window.location = '{{ route('books.create') }}';">
                    {{ __('Add new book') }}
                </x-bladewind::button>
            </div>
        </div>

        <div class="overflow-x-scroll">
            <x-bladewind::table
                hover_effect="true"
                exclude_columns="id, updated_at, description, category_id"
                divider="thin"
                compact="true"
                :action_icons="$action_icons"
                :data="$booksList"/>
        </div>

        <div class="mt-4">
            {{ $books->links() }}
        </div>

    </x-content>

    <script>
        function redirect(url) {
            // Before redirect actions
            window.location = url;
        }
    </script>
</x-app-layout>
