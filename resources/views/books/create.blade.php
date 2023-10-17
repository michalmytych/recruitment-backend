<x-app-layout>

    <x-content>
        <h2 class="font-semibold text-3xl pb-4">
            {{ __('Create new book') }}
        </h2>
        <form action="{{ route('books.store') }}" method="POST">
            @csrf
            <x-bladewind::input required="true" name="title" placeholder="{{ __('Title') }}"/>
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
            <x-bladewind::input required="true" name="author" placeholder="{{ __('Author') }}"/>
            <x-input-error :messages="$errors->get('author')" class="mt-2" />
            <x-bladewind::textarea required="true" name="description" placeholder="{{ __('Description') }}"/>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
            <x-bladewind::input numeric="true" required="true" name="published_at_year" placeholder="{{ __('Published at year') }}"/>
            <x-input-error :messages="$errors->get('published_at_year')" class="mt-2" />
            <x-bladewind::input numeric="true" required="true" name="available_amount" placeholder="{{ __('Available amount') }}"/>
            <x-input-error :messages="$errors->get('available_amount')" class="mt-2" />

            <x-bladewind::select
                placeholder="{{ __('Select book category') }}"
                name="category_id"
                value_key="id"
                label_key="name"
                searchable="true"
                :data="$categories" />
            <x-input-error :messages="$errors->get('category_id')" class="mt-2" />

            <div class="pb-40">
                <div class="flex justify-end">
                    <button type="submit" class="text-blue-600 text-xl font-bold px-4 py-4 hover:underline rounded-md">{{ __('Save') }}</button>
                </div>
            </div>
        </form>
    </x-content>

</x-app-layout>
