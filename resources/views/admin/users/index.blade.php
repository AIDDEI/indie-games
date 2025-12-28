<x-app-layout>
    <x-slot name="title">All Users</x-slot>

    <div class="w-full">
        <h1 class="text-3xl font-bold mb-6">Users</h1>

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
                        <th class="px-6 py-3 border">Name</th>
                        <th class="px-6 py-3 border">Email</th>
                        <th class="px-6 py-3 border">Role</th>
                        <th class="px-6 py-3 border">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr class="border-b">
                            <td class="px-6 py-2 border">{{ $user->id }}</td>
                            <td class="px-6 py-2 border">{{ $user->name }}</td>
                            <td class="px-6 py-2 border">{{ $user->email }}</td>
                            <td class="px-6 py-2 border">
                                <form action="{{ route('admin.users.updateRole', $user) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <select name="role_id" class="border rounded px-2 py-1 w-full"
                                        onchange="this.form.submit()">
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}" @if($user->role_id == $role->id) selected @endif>
                                                {{ $role->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </form>
                            </td>
                            <td class="px-6 py-2 border text-center">
                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this user? This action cannot be undone!');">
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