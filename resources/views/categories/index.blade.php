<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="flex justify-between sm:justify-end sm:px-6 lg:px-8 py-3">
        <a href="{{ route('categories.create') }}" class="w-full sm:w-fit px-4 py-3 bg-white dark:bg-gray-800 shadow sm:rounded-lg">Create</a>
    </div>
    
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            @include('categories.partials.display-categories')
        </div>
    </div>
</x-app-layout>