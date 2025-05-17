<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Завідувач - Головний дашборд') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex gap-8">

            <!-- Меню (зліва) -->
            <aside class="w-64 bg-white p-4 rounded-lg shadow space-y-4">
                <h3 class="text-lg font-bold text-gray-700">{{ __("Меню завідувача") }}</h3>

                <nav class="flex flex-col space-y-2">
                    <a href="{{ route('chief.dashboard') }}"
                       class="block px-4 py-2 rounded hover:bg-gray-200
                        {{ request()->routeIs('chief.dashboard') ? 'bg-gray-300 font-semibold' : '' }}">
                        {{ __('Головна') }}
                    </a>

                    <a href="{{ route('chief.users.index') }}"
                       class="block px-4 py-2 rounded hover:bg-gray-200
                        {{ request()->routeIs('chief.users.*') ? 'bg-gray-300 font-semibold' : '' }}">
                        {{ __('Користувачі') }}
                    </a>

                    <a href="{{ route('chief.patients.index') }}"
                       class="block px-4 py-2 rounded hover:bg-gray-200
                        {{ request()->routeIs('chief.patients.*') ? 'bg-gray-300 font-semibold' : '' }}">
                        {{ __('Пацієнти') }}
                    </a>
                </nav>
            </aside>

            <!-- Основний контент (праворуч) -->
            <div class="flex-1 bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                @yield('content')
            </div>

        </div>
    </div>
</x-app-layout>
