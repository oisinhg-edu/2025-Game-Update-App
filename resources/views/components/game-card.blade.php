@props(['title', 'description', 'cover_img', 'release_date'])

<div class="border rounded-lg overflow-hidden shadow-md hover:shadow-lg transition duration-300">
    <img class="w-full mb-2" src="{{ asset('images/games/' . $cover_img) }}" alt="{{ $title }}">
    <div class="flex justify-between items-center p-2 mb-2">
        <h4 class="font-bold text-lg truncate">{{ $title }}</h4>
        <p>{{ \Carbon\Carbon::parse($release_date)->format('M j, Y') }}</p>
    </div>
</div>
