<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Редагувати користувача') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('users.update', $user->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Ім'я</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="mt-1 block w-full" required />
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="mt-1 block w-full" required />
                        </div>

                        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Зберегти зміни</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
