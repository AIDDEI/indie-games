<x-app-layout>
    <x-slot name="title">Add game</x-slot>

    <h1 class="text-3xl font-bold mb-6">Add your game!</h1>

    <form method="POST" action="{{ route('games.store') }}" enctype="multipart/form-data">

        <x-game-form :genres="$genres" />

    </form>
</x-app-layout>