@props(['id', 'companyName', 'logo_img', 'country', 'founded', 'href' => null])

<div data-href="{{ $href }}"
    onclick="if(!event.target.closest('a,button,form')) { window.location = this.dataset.href; }"
    class="border dark:border-gray-500 bg-white dark:bg-gray-800 hover:bg-gray-200 dark:hover:bg-gray-900 
           rounded-lg shadow transition duration-300 cursor-pointer flex flex-col p-4">

    {{-- Logo --}}
    <div class="flex justify-center items-center mb-3">
        <div
            class="w-24 h-24 rounded-full bg-gray-100 dark:bg-gray-700 flex items-center justify-center overflow-hidden shadow">
            <img src="{{ asset('images/developers/' . $logo_img) }}" alt="{{ $companyName }}" class="object-cover"
                onerror="this.src='{{ asset('images/developers/placeholder_dev.jpg') }}'">
        </div>
    </div>

    {{-- Name --}}
    <h3 class="text-lg font-semibold text-center mb-1">
        {{ $companyName }}
    </h3>

    {{-- Sub info --}}
    <p class="text-sm text-gray-600 dark:text-gray-300 text-center">
        {{ $country }} • Founded {{ $founded }}
    </p>

    {{-- admin actions --}}
    @can('manage-developer')
        <div class="my-4 flex flex-col items-end md:flex-row md:justify-end gap-2">
            <!-- Edit Button, routes to developers.edit using $developer object -->
            <a href="{{ route('developers.edit', $id) }}" onclick="event.stopPropagation();"
                class="inline-flex items-center px-4 py-2 bg-gray-300 dark:bg-gray-700 hover:bg-gray-400 dark:hover:bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-gray-800 dark:text-white uppercase tracking-widest focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                Edit
            </a>

            <!-- Delete Button, needs a form to send delete requests -->
            <!-- Routes to developers.destroy -->
            <form action="{{ route('developers.destroy', $id) }}" method="POST"
                onsubmit="event.stopPropagation(); return confirm('Are you sure you want to delete this developer?');">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-red-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-900 focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"
                    onclick="event.stopPropagation();">
                    Delete
                </button>
            </form>
        </div>
    @endcan
</div>
