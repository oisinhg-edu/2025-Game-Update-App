<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-inherit text-inherit leading-tight">
            {{ $game->title }}
        </h2>
    </x-slot>

    {{-- show success message --}}
    <x-alert-success>
        {{ session('success') }}
    </x-alert-success>

    <div class="py-12">
        <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8 flex justify-center">
            <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg p-6 w-3/4">
                <h3 class="text-xl font-bold mb-10 ">Game Details</h3>
                <x-game-details :title="$game->title" :cover_img="$game->cover_img" :release_date="$game->release_date" :description="$game->description"
                    :platform="$game->platform" />

                {{-- <!-- Quote from api -->
                <div class="flex justify-end">
                    <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg p-6 w-1/4 ms-6">
                        <h3 class="text-xl font-bold mb-10 ">Inspirational Quote</h3>
                        <blockquote class="italic text-gray-600 dark:text-gray-300">"{{ $quote['content'] }}"
                        </blockquote>
                        <p class="mt-4 text-right font-semibold text-gray-800 dark:text-gray-100">-
                            {{ $quote['author'] }}
                        </p>
                    </div>
                </div> --}}

                {{-- Patches --}}
                <h4 class="font-semibold text-md mt-8">Updates</h4>

                {{-- if no patches --}}
                @if ($game->patches->isEmpty())
                    <p>No updates yet.</p>
                @else
                    <div x-data="{ showOlder: false }">
                        <ul class="mt-4 space-y-2">
                            @foreach ($game->patches->sortByDesc('created_at') as $loopIndex => $patch)
                                <li x-data="{ open: {{ $loopIndex === 0 ? 'true' : 'false' }} }" x-show="{{ $loopIndex < 4 ? 'true' : 'showOlder' }}"
                                    x-transition class="border rounded-lg dark:border-gray-500 overflow-hidden">

                                    {{-- header --}}
                                    {{-- on click inverts state of open --}}
                                    <button @click="open = !open"
                                        class="w-full flex justify-between items-center p-4 bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-800">
                                        <span class="font-semibold">Patch {{ $patch->version }}</span>
                                        <span
                                            class="text-sm">{{ $patch->created_at->format('M d, Y') }}</span>

                                        {{-- arrow that flips when box is open --}}
                                        <svg :class="{ 'rotate-180': open }" class="w-4 h-4 ml-2 transition-transform"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </button>

                                    {{-- content --}}
                                    {{-- shows when open is true, set by clicking header --}}
                                    <div x-show="open" x-transition class="p-4 bg-white dark:bg-gray-600">
                                        <p class="font-semibold underline">{{ $patch->user?->name }}</p>
                                        <p>{{ $patch->content }}</p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>

                        {{-- show older patches button --}}
                        @if ($game->patches->count() > 4)
                            {{-- when clicked inverts showOlder state --}}
                            <button @click="showOlder = !showOlder" class="mt-4 text-indigo-500 dark:text-indigo-300 hover:underline">
                                {{-- text changes based on state --}}
                                <span x-text="showOlder ? 'Hide older updates' : 'Show older updates'"></span>
                            </button>
                        @endif
                    </div>
                @endif

                {{-- if user has manage game permissions --}}
                @can('manage-game')
                    <h4 class="font-semibold text-md mt-8">Add patch notes:</h4>
                    <form action="{{ route('patches.store', $game) }}" method="POST" class="mt-4">
                        @csrf
                        <div class="mb-4">
                            <label for="version" class="block font-medium text-sm">Game Version</label>
                            <input name="version" id="version" class="mt-1 block w-full border border-gray-300 rounded-lg dark:bg-gray-600" />
                        </div>

                        <div class="mb-4">
                            <label for="content" class="block font-medium text-sm">Content</label>
                            <textarea name="content" id="content" rows="3" class="mt-1 block w-full border border-gray-300 rounded-lg dark:bg-gray-600"></textarea>
                        </div>

                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Submit Patch Notes
                        </button>
                    </form>
                @endcan
            </div>

        </div>

    </div>
</x-app-layout>
