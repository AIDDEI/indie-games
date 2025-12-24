<x-app-layout>
    <x-slot name="title">Browse Games</x-slot>

    <h1 class="text-3xl font-bold mb-6">Browse Games</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @foreach ($games as $game)
            <div class="bg-white dark:bg-gray-800 rounded shadow p-4">
                <img src="{{ asset('storage/' . $game->cover_image) }}" alt="{{ $game->title }}"
                    class="w-full h-48 object-cover rounded mb-3">

                <h2 class="font-semibold text-lg mb-2">
                    {{ $game->title }}
                </h2>

                <a href="{{ route('games.show', $game) }}" class="text-blue-600 hover:underline">
                    View details
                </a>
            </div>
        @endforeach
    </div>

    <div class="mt-6">
        {{ $games->links() }}
    </div>
</x-app-layout>