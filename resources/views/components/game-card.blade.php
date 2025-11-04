@props(['game', 'title', 'description', 'cover_img', 'release_date', 'href' => null])

{{--
    The card can be made fully clickable by passing an `href` prop.
    The root container will handle navigation when clicked, while inner
    interactive elements stop the event propagation so they work normally.
--}}

{{-- if href present, apply onclick scripts
only if click was not on link, button or form --}}

<div
    @if ($href) data-href="{{ $href }}"
        onclick="if(!event.target.closest('a,button,form')) { window.location = this.dataset.href; }"
        class="border dark:border-gray-500 rounded-lg overflow-hidden shadow-md hover:shadow-lg transition duration-300 cursor-pointer flex flex-col justify-between"
    @else class="border rounded-lg overflow-hidden shadow-md hover:shadow-lg transition duration-300 flex flex-col justify-between" @endif>

    <div class="relative w-full overflow-hidden aspect-[3/4] mb-3 group">
        <img class="object-cover w-full h-full" src="{{ asset('images/games/' . $cover_img) }}" alt="{{ $title }}">

        <!-- White vignette overlay -->
        <div
            class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-500 bg-[radial-gradient(circle_at_center,rgba(0,0,0,0)_50%,rgba(0,0,0,0.4)_100%)]
           dark:bg-[radial-gradient(circle_at_center,rgba(255,255,255,0)_30%,rgba(255,255,255,0.4)_100%)]">
        </div>
    </div>


    <div class="px-4">
        <div class="flex justify-between items-center mb-2 gap-2">
            <h4 class="font-bold text-lg truncate">{{ $title }}</h4>
            <p class="whitespace-nowrap">{{ \Carbon\Carbon::parse($release_date)->format('M j, Y') }}</p>
        </div>

        <!-- edit and delete buttons -->
        <!-- only show if logged in -->
        @can('manage-game')
            <div class="my-4 flex space-x-2 justify-end">
                <!-- Edit Button, routes to game.edit using $game object -->
                <a href="{{ route('games.edit', $game) }}" onclick="event.stopPropagation();"
                    class="inline-flex items-center px-4 py-2 bg-gray-300 dark:bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-gray-800 dark:text-white uppercase tracking-widest hover:bg-gray-200 dark:hover:bg-gray-600 focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                    Edit
                </a>

                <!-- Delete Button, needs a form to send delete requests -->
                <!-- Routes to games.destroy -->
                <form action="{{ route('games.destroy', $game) }}" method="POST"
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
