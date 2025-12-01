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
            <div class="flex items-center justify-end gap-3">
                <label for="count">Games per page: </label>

                <form method="GET" action="{{ route('games.index') }}">

                    <!-- Preserve search term if present -->
                    @if (request('search'))
                        <input type="hidden" name="search" value="{{ request('search') }}">
                    @endif

                    <select name="cards" onchange="this.form.submit()" class="border-gray-300 rounded-lg dark:bg-gray-500">
                        <option value="18" {{ request('cards') == '18' ? 'selected' : '' }}>18</option>
                        <option value="36" {{ request('cards') == '36' ? 'selected' : '' }}>36</option>
                        <option value="54" {{ request('cards') == '54' ? 'selected' : '' }}>54</option>
                    </select>
                </form>
            </div>



            <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="font-semibold text-lg mb-4">List of Games:</h3>

                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 xl:grid-cols-6 gap-6">
                        @forelse ($games as $game)
                            <x-game-card :game="$game" :title="$game->title" :cover_img="$game->cover_img" :release_date="$game->release_date"
                                :description="$game->description" :href="route('games.show', $game)" />
                        @empty
                            <p class="col-span-full text-center text-gray-500">No games found.</p>
                        @endforelse

                    </div>

                </div>

            </div>
            {{ $games->links() }}
        </div>
    </div>
</x-app-layout>
