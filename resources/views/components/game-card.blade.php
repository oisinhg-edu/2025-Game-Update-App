@props(['game', 'title', 'description', 'cover_img', 'release_date'])

<div class="border rounded-lg overflow-hidden shadow-md hover:shadow-lg transition duration-300">
    <img class="w-full mb-2" src="{{ asset('images/games/' . $cover_img) }}" alt="{{ $title }}">
    <div class="flex justify-between items-center p-2 mb-2">
        <h4 class="font-bold text-lg truncate">{{ $title }}</h4>
        <p>{{ \Carbon\Carbon::parse($release_date)->format('M j, Y') }}</p>
    </div>

    <!-- edit and delete buttons -->
    <!-- only show if logged in -->
    @auth
        <div class="my-4 flex space-x-2">
            <!-- Edit Button, routes to game.edit using $game object -->
            <a href="{{ route('games.edit', $game) }}"
                class="text-gray-600 bg-orange-300 hover:bg-orange-700 font-bold py-2 px-4 rounded">
                Edit
            </a>

            <!-- Delete Button, needs a form to send delete requests -->
            <!-- Routes to games.destroy -->
            <form action="{{ route('games.destroy', $game) }}" method="POST"
                onsubmit="return confirm('Are you sure you want to delete this book?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-700 text-gray-600 font-bold py-2 px-4 rounded">
                    Delete
                </button>
            </form>
        </div>
    @endauth
</div>
