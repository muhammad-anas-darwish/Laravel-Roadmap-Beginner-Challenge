<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Articles') }}
        </h2>
    </x-slot>

    @if (count($articles))
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 mt-4">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                @include('articles.partials.display-all-articles')
            </div>
        </div>
    @else
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __('There is no articles yet!') }}
                </div>
            </div>
        </div>
    @endif
</x-app-layout>
