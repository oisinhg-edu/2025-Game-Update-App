<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-inherit text-inherit leading-tight">
            {{ $game->title }}
        </h2>
    </x-slot>

    {{-- show success message --}}
    <x-alert-success>
        {{ session('success') }}
    </x-alert-success>

    <div class="py-12">
        <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8 flex justify-center">
            <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg p-6 w-3/4">
                <h3 class="text-xl font-bold mb-10 ">Game Details</h3>
                <x-game-details :title="$game->title" :cover_img="$game->cover_img" :release_date="$game->release_date" :description="$game->description"
                    :platform="$game->platform" />

                <div class="flex justify-end">
                    <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg p-6 w-1/4 ms-6">
                        <h3 class="text-xl font-bold mb-10 ">Inspirational Quote</h3>
                        <blockquote class="italic text-gray-600 dark:text-gray-300">"{{ $quote['content'] }}"
                        </blockquote>
                        <p class="mt-4 text-right font-semibold text-gray-800 dark:text-gray-100">-
                            {{ $quote['author'] }}
                        </p>
                    </div>

                </div>

            </div>

        </div>

    </div>
</x-app-layout>
