<x-app-layout>
    <div class="text-center mt-20">
        <h1 class="text-5xl font-bold">Error 403</h1>
        <p class="my-4">You are not authorized to access this page.</p>
        <x-cancel-button href="{{ url()->previous() }}">Go Back</x-cancel-button>
    </div>
</x-app-layout>
