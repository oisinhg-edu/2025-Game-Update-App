{{-- data passed to form --}}
@props(['action', 'method', 'game' => null])

<!-- this form allows data entry for a new game -->
<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- Tells laravel to treat form as put or patch even though browser sends as post -->
    @if ($method === 'PUT' || $method === 'PATCH')
        @method($method)
    @endif

    {{-- Title --}}
    <div class="mb-4">
        <label for="title" class="block text-sm text-gray-700">Title</label>

        {{-- input field --}}
        <input type='text' name='title' id='title' value="{{ old('title', $game->title ?? '') }}" required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />

        {{-- error message display --}}
        @error('title')
            <p class='text-sm text-red-600'>{{ $message }}</p>
        @enderror
    </div>

    {{-- Description --}}
    <div class="mb-4">
        <label for="description" class="block text-sm text-gray-700">Description</label>

        {{-- input field --}}
        <input type='text' name='description' id='description'
            value="{{ old('description', $game->description ?? '') }}" required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />

        {{-- error message display --}}
        @error('description')
            <p class='text-sm text-red-600'>{{ $message }}</p>
        @enderror
    </div>

    {{-- Image --}}
    <div class="mb-4">
        <label for="cover_img" class="block text-sm font-medium text-gray-700">Cover Image</label>

        {{-- Displays the cover image if it exists. For Updating. --}}
        @isset($game->cover_img)
            <div class="mb-4">
                <img src="{{ asset('images/games/' . $game->cover_img) }}" alt="Game cover image"
                    class="w-24 h-32 object-cover">
            </div>
        @endisset

        {{-- input field --}}
        <input type='file' name='cover_img' id='cover_img' {{ isset($game) ? '' : 'required' }}
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />

        {{-- error message display --}}
        @error('cover_img')
            <p class='text-sm text-red-600'>{{ $message }}</p>
        @enderror
    </div>

    {{-- Platform --}}
    <div class="mb-4">
        <label for="platform" class="block text-sm text-gray-700">Platform</label>

        {{-- Dropdown box for platform selection --}}
        <select name="platform" id="platform" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">

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
        <label for="release_date" class="block text-sm text-gray-700">Release Date</label>

        {{-- input field --}}
        <input type='date' name='release_date' id='release_date'
            value="{{ old('release_date', $game->release_date ?? '') }}" required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" />

        {{-- error message display --}}
        @error('release_date')
            <p class='text-sm text-red-600'>{{ $message }}</p>
        @enderror
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
