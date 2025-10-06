@props(['title', 'description', 'cover_img', 'release_date', 'platform'])

<div>
    <img class="w-1/2 mb-2" src="{{ asset('images/games/' . $cover_img) }}" alt="{{ $title }}">
    <h4>{{ $title }}</h4>
    <p>Released on {{ \Carbon\Carbon::parse($release_date)->format('F j, Y') }}</p>
    <p>{{ $description }}</p>
    <p>Platform: {{ $platform }}</p>
</div>
