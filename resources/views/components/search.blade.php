<form action="{{ url()->current() }}" class="flex items-center z-10">
    <input type="hidden" name="column" value="search">
    <input type="hidden" name="operator" value="custom">
    <x-search-input searchName="value"></x-search-input>

    @foreach (request()->all() as $key => $value)
        @if ($key != 'value' && $key != 'column' && $key != 'operator')
            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
        @endif
    @endforeach

    @if (request()->get('value') || request()->get('column') || request()->get('operator'))
        <x-link href="{{ route(request()->route()->getName()) }}">
            <div class="flex items-center pt-5 pl-4">
                <svg fill="none" width="25" height="25" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span class="ml-1">{{ __('Clear filters') }}</span>
            </div>
        </x-link>
    @endif
</form>
