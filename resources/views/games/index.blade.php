<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Games') }}
        </h2>
    </x-slot>

    <x-alert-success>
        {{ session('success') }}
    </x-alert-success>

    <div class="py-12">
        <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">List of Games:</h3>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($games as $game)
                            <div class="border p-4 rounded-lg shadow-md">
                                <a href="{{ route('games.show', $game) }}">
                                    <x-game-card :title="$game->title" :cover_img="$game->cover_img" :release_date="$game->release_date"
                                        :description="$game->description" />
                                </a>

                                <!-- edit and delete buttons -->
                                <div class="mt-4 flex space-x-2">
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
                                        <button type="submit"
                                            class="bg-red-500 hover:bg-red-700 text-gray-600 font-bold py-2 px-4 rounded">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
