<x-app-layout>
    <x-slot name="title">{{ $game->title }}</x-slot>

    <div class="grid md:grid-cols-2 gap-8">
        <img src="{{ asset('storage/' . $game->cover_image) }}" alt="{{ $game->title }}" class="rounded shadow">

        <div>
            <h1 class="text-4xl font-bold mb-4">{{ $game->title }}</h1>

            <p class="mb-4 text-gray-700 dark:text-gray-300">
                {{ $game->description }}
            </p>

            <p><strong>Developer:</strong> {{ $game->developer }}</p>
            <p><strong>Release date:</strong> {{ $game->release_date }}</p>

            <p class="mt-4">
                <strong>Genres:</strong>
                {{ $game->genres->pluck('name')->join(', ') }}
            </p>

            <p class="mt-2 text-sm text-gray-500">
                Uploaded by {{ $game->user->name }}
            </p>
        </div>
    </div>
</x-app-layout>