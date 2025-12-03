<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ $developer->company_name }}
        </h2>
    </x-slot>

    <div class="py-8 sm:px-6 lg:px-8">
        {{-- success message --}}
        <x-alert-success>
            {{ session('success') }}
        </x-alert-success>

        <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg p-6 mx-auto max-w-4xl w-full">

            {{-- Developer Details Component --}}
            <x-developer-details 
                :id="$developer->id"
                :companyName="$developer->company_name"
                :logo_img="$developer->logo_img"
                :founded="$developer->founded"
                :country="$developer->country"
            />

            <hr class="my-6 border-gray-300 dark:border-gray-600">

            {{-- Games by this developer --}}
            <h3 class="text-2xl font-semibold mb-4">Games by {{ $developer->company_name }}</h3>

            @if ($developer->games->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($developer->games as $game)
                        <a href="{{ route('games.show', $game) }}"
                           class="block bg-gray-100 dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-900 rounded-lg shadow hover:shadow-md transition p-3">

                            <div class="aspect-[3/4] w-full overflow-hidden rounded">
                                <img src="{{ asset('images/games/' . $game->cover_img) }}"
                                     alt="{{ $game->title }}"
                                     class="w-full h-full object-cover"
                                     onerror="this.src='{{ asset('images/games/placeholder1.jpg') }}'">
                            </div>

                            <h4 class="mt-3 text-lg font-semibold">{{ $game->title }}</h4>
                            <p class="text-sm text-gray-600 dark:text-gray-300">{{ $game->platform }}</p>
                        </a>
                    @endforeach
                </div>
            @else
                <p class="text-gray-500">This developer has no games assigned yet.</p>
            @endif

        </div>
    </div>
</x-app-layout>
