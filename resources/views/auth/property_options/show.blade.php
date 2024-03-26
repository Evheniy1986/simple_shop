@extends('layouts.admin')
@section('title',  'Вариант свойства: '. $propertyOption->name )

@section('content')
    <div class="container">
        <h2 class="text-center mb-3">Вариант свойства: {{ $propertyOption->name }}</h2>
        <table class="table">
            <thead>
            <tr>
                <th>Поле</th>
                <th>Значение</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>ID</td>
                <td>{{ $propertyOption->id }}</td>
            </tr>
            <tr>
                <td>Свойство</td>
                <td>{{ $propertyOption->property->name }}</td>
            </tr>
            <tr>
                <td>Название</td>
                <td>{{ $propertyOption->name }}</td>
            </tr>
            <tr>
                <td>Название En</td>
                <td>{{ $propertyOption->name_en }}</td>
            </tr>
        </table>
    </div>

@endsection

