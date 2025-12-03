<x-app-layout>
    <x-slot name='header'>
        <h2 class="font-semibold text-xl text-gray-800 text-inherit leading-tight">
            {{ __('Edit Game') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    {{-- Page title --}}
                    <h3 class="font-semibold text-lg mb-4">Edit game</h3>

                    {{-- Using game-form component --}}
                    {{-- passing action and method to form, so it knows if it is a store or update --}}
                    <x-game-form :action="route('games.update', $game)" :method="'PUT'" :game="$game" :allDevelopers="$developers"/>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
