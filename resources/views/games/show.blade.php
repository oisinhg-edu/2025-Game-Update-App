<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-inherit text-inherit leading-tight">
            {{ $game->title }}
        </h2>
    </x-slot>


    <div class="py-8 sm:px-6 lg:px-8">
        {{-- show success message --}}
        <x-alert-success>
            {{ session('success') }}
        </x-alert-success>

        <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg p-6 mx-auto max-w-4xl w-full">


            <x-game-details :id="$game->id" :title="$game->title" :cover_img="$game->cover_img" :release_date="$game->release_date" :description="$game->description" :platform="$game->platform" />

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
                            <li x-data="{
                                open: {{ $loopIndex === 0 ? 'true' : 'false' }},
                                editing: false
                            }" x-show="{{ $loopIndex < 4 ? 'true' : 'showOlder' }}" x-transition
                                class="border rounded-lg dark:border-gray-500 overflow-hidden">

                                {{-- Header --}}
                                <button @click="open = !open"
                                    class="w-full flex justify-between items-center p-4 bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-800 focus:bg-gray-200 focus:outline-none">
                                    <span class="font-semibold">Patch {{ $patch->version }}</span>
                                    <span class="text-sm">{{ $patch->created_at->format('M d, Y') }}</span>

                                    <svg :class="{ 'rotate-180': open }" class="w-4 h-4 ml-2 transition-transform"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>

                                {{-- Content --}}
                                <div x-show="open" x-transition class="p-4 bg-white dark:bg-gray-600">

                                    {{-- NOT editing mode --}}
                                    <div x-show="!editing">
                                        <p class="font-semibold underline">{{ $patch->user?->name }}</p>
                                        <p class="break-words">{{ $patch->content }}</p>

                                        @if (auth()->user()?->can('manage-game') || $patch->user?->is(auth()->user()))
                                            <div class="mt-3 flex gap-3 justify-end">
                                                <button @click="editing = true"
                                                    class="inline-flex items-center px-4 py-2 bg-gray-300 dark:bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-gray-800 dark:text-white uppercase tracking-widest hover:bg-gray-200 dark:hover:bg-gray-700 focus:bg-gray-200 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                                    Edit
                                                </button>

                                                <form action="{{ route('patches.destroy', ['game' => $game, 'patch' => $patch]) }}" method="POST"
                                                    onsubmit="return confirm('Delete this patch note?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="inline-flex items-center px-4 py-2 bg-red-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-red-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                                        Delete
                                                    </button>
                                                </form>
                                            </div>
                                        @endif
                                    </div>

                                    {{-- EDIT MODE --}}
                                    <div x-show="editing" x-transition>
                                        <form action="{{ route('patches.update', ['game' => $game, 'patch' => $patch]) }}" method="POST">
                                            @csrf
                                            @method('PUT')

                                            <label class="block font-medium">Version</label>
                                            <input name="version" value="{{ $patch->version }}"
                                                class="w-full border rounded mb-3 dark:bg-gray-700" />

                                            <label class="block font-medium">Content</label>
                                            <textarea name="content" rows="3" class="w-full border rounded dark:bg-gray-700">{{ $patch->content }}</textarea>

                                            <div class="flex gap-3 mt-3 justify-end">
                                                <button type="submit"
                                                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg">
                                                    Save
                                                </button>

                                                <button type="button" @click="editing = false"
                                                    class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded-lg">
                                                    Cancel
                                                </button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </li>
                        @endforeach
                    </ul>

                    {{-- show older patches button --}}
                    @if ($game->patches->count() > 4)
                        {{-- when clicked inverts showOlder state --}}
                        <button @click="showOlder = !showOlder"
                            class="mt-4 text-indigo-500 dark:text-indigo-300 hover:underline">
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
                        <input name="version" id="version"
                            class="mt-1 block w-full border border-gray-300 rounded-lg dark:bg-gray-600" />
                    </div>

                    <div class="mb-4">
                        <label for="content" class="block font-medium text-sm">Content</label>
                        <textarea name="content" id="content" rows="3"
                            class="mt-1 block w-full border border-gray-300 rounded-lg dark:bg-gray-600"></textarea>
                    </div>

                    <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
                        Submit Patch Notes
                    </button>
                </form>
            @endcan

        </div>
    </div>

</x-app-layout>
