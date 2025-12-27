<x-app-layout>
    <x-slot name="title">Browse Games</x-slot>

    <h1 class="text-3xl font-bold mb-6">Browse Games</h1>

    <form method="GET" action="{{ route('games.index') }}" class="mb-6">
        <div class="mb-4">
            <input type="text" name="search" value="{{ request('search') }}"
                placeholder="Search by title or developer..." class="w-full border rounded p-2">
        </div>

        <h2 class="font-semibold mb-2">Filter by genre</h2>

        <div class="flex flex-wrap gap-4">
            @foreach ($genres as $genre)
                <label class="flex items-center gap-2">
                    <input type="checkbox" name="genres[]" value="{{ $genre->id }}" @checked(in_array($genre->id, request('genres', [])))>
                    <span>{{ $genre->name }}</span>
                </label>
            @endforeach
        </div>
        <div class="mt-4 flex gap-4">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
                Apply filters
            </button>
            <a href="{{ route('games.index') }}" class="text-gray-600 underline">
                Reset
            </a>
        </div>
    </form>

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