<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Список пацієнтів') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="w-full border border-gray-300">
                    <thead>
                        <tr>
                            <th class="px-4 py-2">ID</th>
                            <th class="px-4 py-2">Ім'я</th>
                            <th class="px-4 py-2">Дії</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($patients as $patient)
                            <tr>
                                <td class="border px-4 py-2">{{ $patient->id }}</td>
                                <td class="border px-4 py-2">{{ $patient->name }}</td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('doctor.patients.show', $patient->id) }}" class="text-blue-600 hover:underline">Переглянути</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="border px-4 py-2 text-center">Пацієнтів немає.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
