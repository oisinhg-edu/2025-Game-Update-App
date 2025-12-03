@props(['action', 'method', 'developer' => null, 'allGames'])

<form action="{{ $action }}" method="POST" enctype="multipart/form-data" class="text-inherit w-full space-y-6">
    @csrf

    @if ($method === 'PUT' || $method === 'PATCH')
        @method($method)
    @endif

    {{-- Company Name --}}
    <div class="mb-4">
        <label for="company_name" class="block text-sm">Company Name</label>
        <input type="text" id="company_name" name="company_name"
            class="w-full border-gray-300 dark:border-gray-600 rounded"
            value="{{ old('company_name', $developer->company_name ?? '') }}">
        @error('company_name')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    {{-- Founded Year --}}
    <div class="mb-4">
        <label for="founded" class="block text-sm">Founded</label>
        <input type="number" id="founded" name="founded" class="w-full border-gray-300 dark:border-gray-600 rounded"
            value="{{ old('founded', $developer->founded ?? '') }}">
        @error('founded')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    {{-- Country --}}
    <div class="mb-4">
        <label for="country" class="block text-sm">Country</label>
        <input type="text" id="country" name="country" class="w-full border-gray-300 dark:border-gray-600 rounded"
            value="{{ old('country', $developer->country ?? '') }}">
        @error('country')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    {{-- Assign Games --}}
    <div x-data="{
        allGames: @js($allGames),
        selected: @js(isset($developer) ? $developer->games->pluck('id') : []),
        search: '',
        get filteredGames() {
            if (!this.search) return this.allGames;
            return this.allGames.filter(g =>
                g.title.toLowerCase().includes(this.search.toLowerCase())
            );
        },
        addGame(id) {
            if (!this.selected.includes(id)) {
                this.selected.push(id);
            }
        },
        removeGame(id) {
            this.selected = this.selected.filter(i => i !== id);
        }
    }" class="w-full">

        <label class="block text-sm mb-1">Games Developed</label>

        {{-- Search --}}
        <input type="text" x-model="search" placeholder="Search games..."
            class="w-full border-gray-300 dark:border-gray-600 rounded mb-2" />

        {{-- Dropdown --}}
        <div
            class="w-full max-h-40 overflow-y-auto border border-gray-300 dark:border-gray-600 
                rounded bg-white dark:bg-gray-800 mb-3">

            <template x-for="game in filteredGames" :key="game.id">
                <div @click="addGame(game.id)"
                    class="px-3 py-2 hover:bg-gray-200 dark:hover:bg-gray-700 
                        cursor-pointer flex justify-between">
                    <span x-text="game.title"></span>
                    <span x-show="selected.includes(game.id)" class="text-green-600">✔</span>
                </div>
            </template>

        </div>

        {{-- Selected Pills --}}
        <div class="w-full flex flex-wrap gap-2">
            <template x-for="id in selected" :key="id">
                <div @click="removeGame(id)"
                    class="px-3 py-1 bg-blue-600 text-white rounded-full flex items-center gap-2
                        cursor-pointer whitespace-nowrap max-w-full select-none">

                    <span x-text="allGames.find(g => g.id === id)?.title"></span>
                    <span class="font-bold">×</span>

                    {{-- Hidden input to submit --}}
                    <input type="hidden" name="games[]" :value="id">
                </div>
            </template>
        </div>

    </div>

    {{-- Logo Image --}}
    <div class="mb-4">
        <label for="logo_img" class="block text-sm">Logo Image</label>

        {{-- If editing, show preview --}}
        @if (isset($developer) && $developer->logo_img)
            <div class="mb-2">
                <img src="{{ asset('images/developers/' . $developer->logo_img) }}" alt="Developer logo"
                    class="w-24 h-24 object-contain rounded border dark:border-gray-600">
            </div>
        @endif

        <input type="file" id="logo_img" name="logo_img"
            class="w-full border-gray-300 dark:border-gray-600 rounded">
        @error('logo_img')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <x-primary-button>
        {{ isset($developer) ? 'Update Developer' : 'Add Developer' }}
    </x-primary-button>

    <x-cancel-button href="{{ url()->previous() }}">
        Cancel
    </x-cancel-button>
</form>
