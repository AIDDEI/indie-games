<x-app-layout>
    <x-slot name="title">All Roles</x-slot>

    <div class="w-full">
        <h1 class="text-3xl font-bold mb-6">Roles</h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.roles.store') }}" method="POST" class="mb-6">
            @csrf
            <div class="flex items-center gap-2">
                <input type="text" name="name" placeholder="New role name" value="{{ old('name') }}"
                    class="border rounded p-2 flex-1">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
                    Add Role
                </button>
            </div>
            @error('name')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </form>

        <div class="w-full overflow-x-auto">
            <table class="min-w-full border rounded table-auto">
                <thead class="bg-gray-200 dark:bg-gray-700">
                    <tr>
                        <th class="px-6 py-3 border">ID</th>
                        <th class="px-6 py-3 border">Name</th>
                        <th class="px-6 py-3 border">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $role)
                        <tr class="border-b">
                            <td class="px-6 py-2 border">{{ $role->id }}</td>
                            <td class="px-6 py-2 border">{{ $role->name }}</td>
                            <td class="px-6 py-2 border text-center">
                                <form action="{{ route('admin.roles.destroy', $role) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this role? This action cannot be undone!');">
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