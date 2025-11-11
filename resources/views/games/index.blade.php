<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-inherit leading-tight">
            {{ __('All Games') }}
        </h2>

    </x-slot>

    <x-alert-success>
        {{ session('success') }}
    </x-alert-success>

    <div class="py-12">
        <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="font-semibold text-lg mb-4">List of Games:</h3>

                    <div class="grid sm:grid-cols-2 md:grid-cols-4 xl:grid-cols-5 gap-6">
                        @forelse ($games as $game)
                            <x-game-card :game="$game" :title="$game->title" :cover_img="$game->cover_img" :release_date="$game->release_date"
                                :description="$game->description" :href="route('games.show', $game)" />
                        @empty
                            <p class="col-span-full text-center text-gray-500">No games found.</p>
                        @endforelse

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
