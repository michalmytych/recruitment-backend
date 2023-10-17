<div>
    <label for="table-search" class="sr-only">{{ __('Search') }}</label>
    <div class="relative mt-1">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                 fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
        </div>
        <input type="text" id="table-search"
               name="{{ $searchName ?? 'search' }}"
               class="block p-2 pl-10 text-sm text-gray-800 border border-slate-200 rounded-xl w-80 bg-gray-50 focus:ring-blue-300 focus:border-blue-300 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 z-10"
               placeholder="Search for items">
    </div>
</div>
