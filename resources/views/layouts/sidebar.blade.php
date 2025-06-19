<div class="fixed top-0 left-0 w-64 h-screen bg-white border-r dark:bg-gray-800 dark:border-gray-600 z-50">
    <div class="px-4 py-8">
        <h2 class="text-3xl font-semibold text-center text-gray-800 dark:text-white">Hello :)</h2>
    </div>

    <nav class="flex flex-col justify-between h-[calc(100%-6rem)] px-4 pb-8 overflow-hidden">
        {{-- Menu utama --}}
        <div class="space-y-1">
            <a href="{{ route('admin.dashboard') }}"
                class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'sidebar-active' : '' }}">
                Dashboard
            </a>

            <a href="{{ route('admin.serasi.index') }}"
                class="sidebar-link {{ request()->routeIs('admin.serasi.*') ? 'sidebar-active' : '' }}">
                Data Aspirasi
            </a>

            <a href="{{ route('admin.users.index') }}"
                class="sidebar-link {{ request()->routeIs('admin.users.*') ? 'sidebar-active' : '' }}">
                Manajemen User
            </a>
        </div>

        {{-- Profil dan logout --}}
        <div class="mt-6 border-t pt-4">
            <a href="{{ route('profile.edit') }}"
                class="sidebar-link {{ request()->routeIs('profile.edit') ? 'sidebar-active' : '' }}">
                Profil
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="w-full text-left px-4 py-2 mt-2 text-sm font-semibold rounded-lg
                    text-red-600 hover:bg-red-100 dark:hover:bg-red-700 dark:text-red-400">
                    Logout
                </button>
            </form>
        </div>
    </nav>
</div>
