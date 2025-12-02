@props(['id', 'title', 'description', 'cover_img', 'release_date', 'platform'])

<div class="max-w-6xl mx-auto p-4 md:p-8 bg-white dark:bg-gray-900 shadow-md rounded-lg">
    <div class="flex flex-col md:flex-row gap-6">

        {{-- Game Cover --}}
        <div class="flex-shrink-0 md:w-1/3 w-full">
            <div class="aspect-[3/4] w-full bg-gray-200 dark:bg-gray-800 rounded-lg overflow-hidden shadow-sm">
                <img class="w-full h-full object-cover" src="{{ asset('images/games/' . $cover_img) }}"
                    alt="{{ $title }}" loading="lazy"
                    onerror="this.src='{{ asset('images/games/placeholder1.jpg') }}'">
            </div>
        </div>

        {{-- Game Info --}}
        <div class="flex flex-col justify-between">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold underline mb-4">{{ $title }}</h1>

                <p class="mb-4 leading-relaxed">{{ $description }}</p>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                    <p><span class="font-semibold">Released on:</span>
                        {{ \Carbon\Carbon::parse($release_date)->format('F j, Y') }}</p>
                    <p><span class="font-semibold">Platform:</span> {{ $platform }}</p>
                </div>
            </div>

            <!-- edit and delete buttons -->
            <!-- only show if admin -->
            @can('manage-game')
                <div class="my-4 flex flex-col items-end md:flex-row md:justify-end gap-1">
                    <!-- Edit Button, routes to game.edit using $game object -->
                    <a href="{{ route('games.edit', $id) }}" onclick="event.stopPropagation();"
                        class="inline-flex items-center px-4 py-2 bg-gray-300 dark:bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-gray-800 dark:text-white uppercase tracking-widest hover:bg-gray-200 dark:hover:bg-gray-600 focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                        Edit
                    </a>

                    <!-- Delete Button, needs a form to send delete requests -->
                    <!-- Routes to games.destroy -->
                    <form action="{{ route('games.destroy', $id) }}" method="POST"
                        onsubmit="event.stopPropagation(); return confirm('Are you sure you want to delete this game?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-red-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
                            onclick="event.stopPropagation();">
                            Delete
                        </button>
                    </form>
                </div>
            @endcan

        </div>

    </div>

</div>
