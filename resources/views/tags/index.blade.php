<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tags') }}
        </h2>
    </x-slot>

    <div class="flex justify-between sm:justify-end sm:px-6 lg:px-8 py-3">
        <a href="{{ route('tags.create') }}"
            class="w-full sm:w-fit px-4 py-3 bg-white dark:bg-gray-800 shadow sm:rounded-lg">Create</a>
    </div>

    @if (count($tags))
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                @include('tags.partials.display-tags')
            </div>
        </div>
    @else
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __('There is no data yet!') }}
                </div>
            </div>
        </div>
    @endempty
</x-app-layout>
