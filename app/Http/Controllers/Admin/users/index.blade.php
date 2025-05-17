@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Користувачі') }}
    </h2>
@endsection

@section('content')
    <div class="max-w-7xl mx-auto p-6 bg-white rounded shadow">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-bold">{{ __('Список користувачів') }}</h3>
            <a href="{{ route('admin.users.create') }}" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                {{ __('Додати користувача') }}
            </a>
        </div>

        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        <table class="min-w-full table-auto border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 px-4 py-2 text-left">ID</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Ім'я</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Email</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Роль</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Дії</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $user->id }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $user->name }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $user->email }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            @switch($user->role)
                                @case(1)
                                    Завідувач
                                    @break
                                @case(2)
                                    Адміністратор
                                    @break
                                @case(3)
                                    Лікар
                                    @break
                                @case(4)
                                    Медсестра
                                    @break
                                @default
                                    Невідомо
                            @endswitch
                        </td>
                        <td class="border border-gray-300 px-4 py-2 space-x-2">
                            <a href="{{ route('admin.users.edit', $user->id) }}"
                               class="text-blue-600 hover:underline">Редагувати</a>

                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline"
                                  onsubmit="return confirm('Ви впевнені, що хочете видалити цього користувача?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Видалити</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="border border-gray-300 px-4 py-2 text-center text-gray-500">
                            Користувачів не знайдено.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-4">
            {{ $users->links() }} {{-- пагінація --}}
        </div>
    </div>
@endsection
