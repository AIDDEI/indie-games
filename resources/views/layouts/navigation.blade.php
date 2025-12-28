<nav class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <!-- Left side -->
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="/" class="text-xl font-bold text-gray-800 dark:text-gray-200">
                        Indie Games Collection
                    </a>
                </div>

                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <a href="{{ route('games.index') }}"
                        class="flex items-center text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                        Games
                    </a>
                </div>
                @auth
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <a href="{{ route('games.create') }}"
                            class="flex items-center text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                            Add Game
                        </a>
                    </div>
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <a href="{{ route('favorites.index') }}"
                            class="flex items-center text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                            Favorites
                        </a>
                    </div>
                @endauth
            </div>

            <!-- Right side -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                @guest
                    <a href="{{ route('login') }}"
                        class="text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                        Login
                    </a>
                    <a href="{{ route('register') }}"
                        class="text-gray-600 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium ml-4">
                        Register
                    </a>
                @else
                    <div class="ml-3 relative">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button
                                    class="flex items-center text-sm font-medium text-gray-500 dark:text-gray-300 hover:text-gray-700">
                                    {{ Auth::user()->name }}
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link href="{{ route('profile.edit') }}">
                                    My Profile
                                </x-dropdown-link>

                                <x-dropdown-link href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </x-dropdown-link>

                                <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                    @csrf
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @endguest
            </div>
        </div>
    </div>
</nav>