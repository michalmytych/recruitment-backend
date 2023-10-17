<x-app-layout>
    <x-content>

        <div class="flex justify-end mb-6 items-center">
            <x-link href="{{ route('books.index') }}">{{ __('Back to list') }}</x-link>
        </div>

        <div class="w-full">
            <x-bladewind::card reduce_padding="true">
                <div>
                    <div class="flex justify-between">
                        <h2 class="font-bold text-3xl text-black">{{ $book->title }}</h2>
                        <div>
                            <form id="deleteForm" action="{{ route('books.destroy', ['book' => $book->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-600 font-bold text-lg hover:text-red-500 hover:underline" type="submit">{{ __('Delete') }}</button>
                            </form>
                        </div>
                    </div>
                    <div class="text-sm font-semibold text-slate-600">
                        {{ $book->category?->name ?? __('No category') }}
                    </div>
                    <div class="text-slate-600 text-lg">{{ $book->author }}</div>
                    <div class="text-sm italic">{{ $book->published_at_year }}</div>
                </div>
                <div class="pb-10">
                    <p>
                        {{ $book->description }}
                    </p>
                </div>
                <div class="rounded-md overflow-hidden">
                    <img src="https://picsum.photos/1200/800" alt="Book image."/>
                </div>
            </x-bladewind::card>

        </div>
    </x-content>

    <script>
        window.addEventListener('load', () => {
            const text = "{{ __('Confirm deletion.') }}";
            const deleteForm = document.getElementById('deleteForm');

            deleteForm.addEventListener('submit', (e) => {
                if (!confirm(text)) {
                    e.preventDefault();
                }
            });
        });
    </script>
</x-app-layout>
