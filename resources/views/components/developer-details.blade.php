@props(['id', 'companyName', 'logo_img', 'founded', 'country'])

<div class="max-w-6xl mx-auto p-4 md:p-8 bg-white dark:bg-gray-900 shadow-md rounded-lg">
    <div class="flex flex-col md:flex-row gap-6">

        {{-- Logo --}}
        <div class="flex-shrink-0 md:w-1/3 w-full">
            <div class="aspect-square w-full bg-gray-200 dark:bg-gray-800 rounded-lg overflow-hidden shadow-sm">
                <img class="w-full h-full object-cover"
                     src="{{ asset('images/developers/' . $logo_img) }}"
                     alt="{{ $companyName }}"
                     onerror="this.src='{{ asset('images/developers/placeholder_dev.jpg') }}'">
            </div>
        </div>

        {{-- Info --}}
        <div class="flex flex-col w-full justify-between">
            <div>
                <h1 class="text-3xl font-bold mb-2">{{ $companyName }}</h1>

                <p class="text-sm text-gray-700 dark:text-gray-400"><strong>Founded:</strong> {{ $founded }}</p>
                <p class="text-sm text-gray-700 dark:text-gray-400"><strong>Country:</strong> {{ $country }}</p>
            </div>

            @can('manage-developer')
                <div class="my-4 flex flex-col items-end md:flex-row md:justify-end gap-2">
                    <!-- Edit Button, routes to developers.edit using $developer object -->
                    <a href="{{ route('developers.edit', $id) }}" onclick="event.stopPropagation();"
                        class="inline-flex items-center px-4 py-2 bg-gray-300 dark:bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-gray-800 dark:text-white uppercase tracking-widest hover:bg-gray-200 dark:hover:bg-gray-600 focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                        Edit
                    </a>

                    <!-- Delete Button, needs a form to send delete requests -->
                    <!-- Routes to developers.destroy -->
                    <form action="{{ route('developers.destroy', $id) }}" method="POST"
                        onsubmit="event.stopPropagation(); return confirm('Are you sure you want to delete this developer?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-red-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
                            onclick="event.stopPropagation();">
                            Delete
                        </button>
                    </form>
                </div>
            @endcan

        </div>
    </div>
</div>
