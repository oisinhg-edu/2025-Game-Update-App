<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $game->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8 flex justify-center">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 w-3/4">
                <h3>Game Details</h3>
                <x-game-details
                    :title="$game->title"
                    :cover_img="$game->cover_img"
                    :release_date="$game->release_date"
                    :description="$game->description"
                    :platform="$game->platform"
                />
            </div>
        </div>
    </div>
</x-app-layout>
