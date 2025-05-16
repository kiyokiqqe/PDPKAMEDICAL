<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Адміністратор - Головний дашборд') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3>{{ __("Вітаємо на дашборді адміністратора") }}</h3>
                    <p>{{ __("Тут ви можете переглядати та управляти користувачами.") }}</p>
                    <a href="{{ route('users.index') }}" class="text-blue-500">Переглянути користувачів</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
