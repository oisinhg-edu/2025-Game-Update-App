<x-app-layout>
    <section class="text-center py-16">
        <h1 class="text-4xl font-bold mb-4 flex gap-5 justify-center items-center">Welcome to The Game DB
            <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
        </h1>
        <p class="mb-6">
            Explore your favorite games! @cannot('manage-game')
                Admins can
            @endcannot Add and Edit!
        </p>
        <a href="{{ route('games.index') }}">
            <x-primary-button>
                View all games
            </x-primary-button>
        </a>
    </section>

    <section class="py-12 dark:text-gray-100">
        <h2 class="text-2xl font-bold text-center mb-8">Recently Added Games</h2>
        <div class="max-w-[60%] grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-16 max-w-5xl mx-auto">
            @foreach ($recentGames as $game)
                <x-game-card :game="$game" :title="$game->title" :cover_img="$game->cover_img" :release_date="$game->release_date" :description="$game->description"
                    :href="route('games.show', $game)" />
            @endforeach
        </div>
        <div class="text-center mt-8">
            <a href="{{ route('games.index') }}">
                <x-primary-button>
                    See all games →
                </x-primary-button>
            </a>
        </div>
    </section>

    @can('manage-game')
        <div class="text-center py-10">
            <hr class="w-[50%] mx-auto mb-8">
            <p class="text-lg mb-6">Want to add a new game?</p>
            <a href="{{ route('games.create') }}">
                <x-primary-button>
                    Create a game
                </x-primary-button>
            </a>
        </div>
    @endcan
</x-app-layout>
