@extends('layouts.admin')
@section('title',  'Свойства: '. $property->name )

@section('content')
    <div class="container">
        <h2 class="text-center mb-3">{{ $property->name }}</h2>
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
                <td>{{ $property->id }}</td>
            </tr>
            <tr>
                <td>Название</td>
                <td>{{ $property->name }}</td>
            </tr>
            <tr>
                <td>Название En</td>
                <td>{{ $property->name_en }}</td>
            </tr>
{{--            <tr>--}}
{{--                <td>Кол-во товаров</td>--}}
{{--                <td>{{ $property->products->count() }}</td>--}}
{{--            </tr>--}}
            </tbody>
        </table>
    </div>

@endsection

