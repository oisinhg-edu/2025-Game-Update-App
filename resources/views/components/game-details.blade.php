@props(['title', 'description', 'cover_img', 'release_date', 'platform'])

<div class="max-w-6xl mx-auto p-4 md:p-8 bg-white dark:bg-gray-900 shadow-md rounded-lg">
    <div class="flex flex-col md:flex-row gap-6">

        {{-- Game Cover --}}
        <div class="flex-shrink-0 md:w-1/3 w-full">
            <div class="aspect-[3/4] w-full bg-gray-200 dark:bg-gray-800 rounded-lg overflow-hidden shadow-sm">
                <img class="w-full h-full object-cover" src="{{ asset('images/games/' . $cover_img) }}"
                    alt="{{ $title }}" loading="lazy"
                    onerror="this.src='{{ asset('images/games/placeholder1.jpg') }}'">
            </div>
        </div>

        {{-- Game Info --}}
        <div class="flex-1">
            <h1 class="text-2xl md:text-3xl font-bold underline mb-4">{{ $title }}</h1>

            <p class="mb-4 leading-relaxed">{{ $description }}</p>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                <p><span class="font-semibold">Released on:</span>
                    {{ \Carbon\Carbon::parse($release_date)->format('F j, Y') }}</p>
                <p><span class="font-semibold">Platform:</span> {{ $platform }}</p>
            </div>
        </div>

    </div>

</div>
