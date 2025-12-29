<x-app-layout>
    <x-slot name="title">All Games</x-slot>

    <div class="w-full">
        <h1 class="text-3xl font-bold mb-6">Games</h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="w-full overflow-x-auto">
            <table class="min-w-full w-full border rounded table-auto">
                <thead class="bg-gray-200 dark:bg-gray-700">
                    <tr>
                        <th class="px-6 py-3 border">ID</th>
                        <th class="px-6 py-3 border">Title</th>
                        <th class="px-6 py-3 border">Owner</th>
                        <th class="px-6 py-3 border">Developer</th>
                        <th class="px-6 py-3 border">Created At</th>
                        <th class="px-6 py-3 border">Details</th>
                        <th class="px-6 py-3 border">Status</th>
                        <th class="px-6 py-3 border">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($games as $game)
                        <tr class="border-b">
                            <td class="px-6 py-2 border">{{ $game->id }}</td>
                            <td class="px-6 py-2 border">{{ $game->title }}</td>
                            <td class="px-6 py-2 border">{{ $game->user->name }}</td>
                            <td class="px-6 py-2 border">{{ $game->developer }}</td>
                            <td class="px-6 py-2 border">{{ $game->created_at->format('d-m-Y') }}</td>
                            <td class="px-6 py-2 border text-center">
                                <a href="{{ route('games.show', $game) }}" class="bg-blue-600 text-white px-4 py-2 rounded">
                                    View
                                </a>
                            </td>
                            <td class="px-6 py-2 border text-center">
                                <span class="inline-block text-white px-4 py-2 rounded
                                    {{ $game->is_active ? 'bg-green-600' : 'bg-gray-500' }}">
                                    {{ $game->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td class="px-6 py-2 border text-center">
                                <form action="{{ route('admin.games.destroy', $game) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this game? This action cannot be undone!');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>