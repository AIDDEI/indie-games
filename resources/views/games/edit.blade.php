<x-app-layout>
    <x-slot name="title">Edit {{ $game->title }}</x-slot>

    <h1 class="text-3xl font-bold mb-6">Edit {{ $game->title }}</h1>

    <form method="POST" action="{{ route('games.update', $game) }}" enctype="multipart/form-data">

        @method('PUT')
        <x-game-form :game="$game" :genres="$genres" />

    </form>
</x-app-layout>