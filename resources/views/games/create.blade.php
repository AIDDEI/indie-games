<x-app-layout>
    <x-slot name="title">Add game</x-slot>

    <form method="POST" action="{{ route('games.store') }}" enctype="multipart/form-data">

        <x-game-form :genres="$genres" />

    </form>
</x-app-layout>