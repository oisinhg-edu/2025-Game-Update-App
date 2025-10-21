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
        class="border rounded-lg overflow-hidden shadow-md hover:shadow-lg transition duration-300 cursor-pointer"
    @else class="border rounded-lg overflow-hidden shadow-md hover:shadow-lg transition duration-300" @endif>

    <img class="w-full mb-3" src="{{ asset('images/games/' . $cover_img) }}" alt="{{ $title }}">

    <div class="px-4">
        <div class="flex justify-between items-center mb-2">
            <h4 class="font-bold text-lg truncate">{{ $title }}</h4>
            <p>{{ \Carbon\Carbon::parse($release_date)->format('M j, Y') }}</p>
        </div>

        <!-- edit and delete buttons -->
        <!-- only show if logged in -->
        @auth
            <div class="my-4 flex space-x-2">
                <!-- Edit Button, routes to game.edit using $game object -->
                <a href="{{ route('games.edit', $game) }}" onclick="event.stopPropagation();"
                    class="text-gray-600 bg-orange-300 hover:bg-orange-700 font-bold py-2 px-4 rounded">
                    Edit
                </a>

                <!-- Delete Button, needs a form to send delete requests -->
                <!-- Routes to games.destroy -->
                <form action="{{ route('games.destroy', $game) }}" method="POST"
                    onsubmit="event.stopPropagation(); return confirm('Are you sure you want to delete this book?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-gray-600 font-bold py-2 px-4 rounded"
                        onclick="event.stopPropagation();">
                        Delete
                    </button>
                </form>
            </div>
        @endauth
    </div>

</div>
