{{-- data passed to form --}}
@props(['action', 'method', 'game' => null, 'allDevelopers'])

<!-- this form allows data entry for a new game -->
<form action="{{ $action }}" method="POST" enctype="multipart/form-data" class="text-inherit">
    @csrf

    <!-- Tells laravel to treat form as put or patch even though browser sends as post -->
    @if ($method === 'PUT' || $method === 'PATCH')
        @method($method)
    @endif

    {{-- Title --}}
    <div class="mb-4">
        <label for="title" class="block text-sm">Title</label>

        {{-- input field --}}
        <input type='text' name='title' id='title' value="{{ old('title', $game->title ?? '') }}" required
            class="mt-1 block w-full border-gray-300 dark:border-gray-200 rounded-md shadow-sm bg-white dark:bg-gray-500" />

        {{-- error message display --}}
        @error('title')
            <p class='text-sm text-red-600'>{{ $message }}</p>
        @enderror
    </div>

    {{-- Description --}}
    <div class="mb-4">
        <label for="description" class="block text-sm">Description</label>

        {{-- input field --}}
        <textarea name="description" id="description" required
            class="mt-1 block w-full border-gray-300 dark:border-gray-200 rounded-md shadow-sm bg-white dark:bg-gray-500 resize-y p-2">{{ old('description', $game->description ?? '') }}</textarea>

        {{-- error message display --}}
        @error('description')
            <p class='text-sm text-red-600'>{{ $message }}</p>
        @enderror
    </div>

    {{-- Image --}}
    <div class="mb-4">
        <label for="cover_img" class="block text-sm font-medium">Cover Image</label>

        {{-- Displays the cover image if it exists. For Updating. --}}
        @isset($game->cover_img)
            <div class="mb-4">
                <img src="{{ asset('images/games/' . $game->cover_img) }}" alt="Game cover image"
                    class="w-24 h-32 object-cover">
            </div>
        @endisset

        {{-- input field --}}
        <input type='file' name='cover_img' id='cover_img' {{ isset($game) ? '' : 'required' }}
            class="mt-1 block border-gray-300 dark:border-gray-200 rounded-sm shadow-sm focus:ring-indigo-500 focus:border-indigo-500 bg-white dark:bg-gray-500" />

        {{-- error message display --}}
        @error('cover_img')
            <p class='text-sm text-red-600'>{{ $message }}</p>
        @enderror
    </div>

    {{-- Platform --}}
    <div class="mb-4">
        <label for="platform" class="block text-sm">Platform</label>

        {{-- Dropdown box for platform selection --}}
        <select name="platform" id="platform" required
            class="mt-1 block border-gray-300 dark:border-gray-200 rounded-md shadow-sm bg-white dark:bg-gray-500">

            {{-- getting platform values using function in game model --}}
            @foreach (\App\Models\Game::getPlatformOptions() as $platform)
                <option value="{{ $platform }}"
                    {{ old('platform', $game->platform ?? '') === $platform ? 'selected' : '' }}>
                    {{ $platform }}
                </option>
            @endforeach
        </select>

        {{-- error message display --}}
        @error('platform')
            <p class='text-sm text-red-600'>{{ $message }}</p>
        @enderror
    </div>

    {{-- Release date --}}
    <div class="mb-4">
        <label for="release_date" class="block text-sm">Release Date</label>

        {{-- input field --}}
        <input type='date' name='release_date' id='release_date'
            value="{{ old('release_date', $game->release_date ?? '') }}" required
            class="mt-1 block border-gray-300 dark:border-gray-200 rounded-md shadow-sm bg-white dark:bg-gray-500" />

        {{-- error message display --}}
        @error('release_date')
            <p class='text-sm text-red-600'>{{ $message }}</p>
        @enderror
    </div>

    {{-- Assign Developers --}}
    <div x-data="{
        allDevelopers: @js($allDevelopers),
        selected: @js(isset($game) ? $game->developers->pluck('id') : []),
        search: '',
        get filteredDevelopers() {
            if (!this.search) return this.allDevelopers;
            return this.allDevelopers.filter(d =>
                d.company_name.toLowerCase().includes(this.search.toLowerCase())
            );
        },
        addDeveloper(id) {
            if (!this.selected.includes(id)) {
                this.selected.push(id);
            }
        },
        removeDeveloper(id) {
            this.selected = this.selected.filter(i => i !== id);
        }
    }" class="mb-4">

        <label class="block text-sm mb-2">Developers</label>

        {{-- Search --}}
        <input type="text" x-model="search" placeholder="Search developers..."
            class="w-full border-gray-300 dark:border-gray-600 rounded mb-2">

        {{-- Dropdown --}}
        <div
            class="max-h-40 overflow-y-auto border border-gray-300 dark:border-gray-600 rounded mb-3 bg-white dark:bg-gray-800">
            <template x-for="dev in filteredDevelopers" :key="dev.id">
                <div @click="addDeveloper(dev.id)"
                    class="px-3 py-2 hover:bg-gray-200 dark:hover:bg-gray-700 cursor-pointer flex justify-between">
                    <span x-text="dev.company_name"></span>
                    <span x-show="selected.includes(dev.id)" class="text-green-600 text-sm">✔</span>
                </div>
            </template>
        </div>

        {{-- Selected pills --}}
        <div class="flex flex-wrap gap-2">
            <template x-for="id in selected" :key="id">
                <div @click="removeDeveloper(id)"
                    class="px-3 py-1 bg-blue-600 text-white rounded-full flex items-center cursor-pointer gap-2">
                    <span x-text="allDevelopers.find(d => d.id === id)?.company_name"></span>
                    <span class="font-bold">×</span>

                    {{-- Hidden input to submit --}}
                    <input type="hidden" name="developers[]" :value="id">
                </div>
            </template>
        </div>

    </div>

    {{-- Checks if game already exists and displays appropriate message --}}
    <x-primary-button>
        {{ isset($game) ? 'Update Game' : 'Add Game' }}
    </x-primary-button>

    {{-- cancel component to go to previous page --}}
    <x-cancel-button href="{{ url()->previous() }}">
        Cancel
    </x-cancel-button>
</form>
