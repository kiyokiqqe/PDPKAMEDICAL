@extends('layouts.doctor')

@section('content')
    <h3 class="text-xl font-semibold mb-4">{{ __('Деталі пацієнта') }}</h3>

    <p><strong>ID:</strong> {{ $patient->id }}</p>
    <p><strong>Ім'я:</strong> {{ $patient->first_name }}</p>
    <p><strong>Прізвище:</strong> {{ $patient->last_name }}</p>
    {{-- Додаткові поля --}}
@endsection
