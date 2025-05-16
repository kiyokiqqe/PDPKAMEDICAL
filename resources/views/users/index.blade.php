<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Управління користувачами') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3>{{ __("Список користувачів") }}</h3>
                    <ul>
                        @foreach($users as $user)
                            <li>
                                {{ $user->name }} ({{ $user->email }})
                                <a href="{{ route('users.edit', $user->id) }}" class="text-blue-500">Редагувати</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
