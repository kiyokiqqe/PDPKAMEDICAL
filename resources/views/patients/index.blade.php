@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Пацієнти - Завідувач') }}
    </h2>
@endsection

@section('content')
    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="text-lg font-bold mb-4">{{ __("Список пацієнтів") }}</h3>

        @if($patients->isEmpty())
            <p>{{ __("Пацієнтів поки що немає.") }}</p>
        @else
            <table class="min-w-full table-auto border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border border-gray-300 px-4 py-2 text-left">ID</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Ім'я</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Дата народження</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Телефон</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Адреса</th>
                        <th class="border border-gray-300 px-4 py-2 text-left">Дії</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($patients as $patient)
                        <tr>
                            <td class="border border-gray-300 px-4 py-2">{{ $patient->id }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $patient->name }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $patient->dob }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $patient->phone }}</td>
                            <td class="border border-gray-300 px-4 py-2">{{ $patient->address }}</td>
                            <td class="border border-gray-300 px-4 py-2">
                                <a href="{{ route('chief.patients.show', $patient->id) }}" class="text-blue-600 hover:underline">Переглянути</a> |
                                <a href="{{ route('chief.patients.edit', $patient->id) }}" class="text-green-600 hover:underline">Редагувати</a> |
                                <form action="{{ route('chief.patients.destroy', $patient->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Видалити пацієнта?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Видалити</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
