<x-app-layout>
    <x-slot name='header'>
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Add New Developer') }}
        </h2>
    </x-slot>

    <div class="py-12 text-inherit">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">

                    <h3 class="font-semibold text-lg mb-4">Add developer</h3>

                    <x-developer-form :action="route('developers.store')" :method="'POST'" :allGames="$games" />

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
