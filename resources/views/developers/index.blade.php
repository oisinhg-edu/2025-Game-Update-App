<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('All Developers') }}
        </h2>
    </x-slot>

    <x-alert-success>
        {{ session('success') }}
    </x-alert-success>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Developers Grid --}}
            <div class="bg-white dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg p-6">

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

                    @forelse ($developers as $developer)
                        <x-developer-card 
                            :id="$developer->id"
                            :companyName="$developer->company_name"
                            :logo_img="$developer->logo_img"
                            :country="$developer->country"
                            :founded="$developer->founded"
                            :href="route('developers.show', $developer)"
                        />
                    @empty
                        <p class="col-span-full text-center text-gray-500">No developers found.</p>
                    @endforelse

                </div>

            </div>

            {{ $developers->links() }}
        </div>
    </div>
</x-app-layout>
