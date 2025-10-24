@props(['title', 'description', 'cover_img', 'release_date', 'platform'])
<div>
    <div class="flex gap-6 p-5">

        <div class="flex-1">
            <img class="w-[80%] mx-auto" src="{{ asset('images/games/' . $cover_img) }}" alt="{{ $title }}">
        </div>

        <div class="flex-1 pe-5">
            <h1 class="text-3xl mb-5 underline font-semibold">{{ $title }}</h1>

            <p class="mb-5">{{ $description }}</p>

            <p><span class="font-bold">Released on:</span> {{ \Carbon\Carbon::parse($release_date)->format('F j, Y') }}</p>

            <p><span class="font-bold">Platform:</span> {{ $platform }}</p>
        </div>
    </div>
</div>
