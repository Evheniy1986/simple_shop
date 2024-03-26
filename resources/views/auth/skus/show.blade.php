@extends('layouts.admin')
@section('title',  'Sku: '. $sku->name )

@section('content')
    <div class="container">
        <h2 class="text-center mb-3">{{ $sku->product->name }}</h2>
        <h2 class="text-center mb-3">{{ $sku->propertyOptions->map->name->implode(', ')  }}</h2>
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
                <td>{{ $sku->id }}</td>
            </tr>
            <tr>
                <td>Цена</td>
                <td>{{ $sku->price }}</td>
            </tr>
            <tr>
                <td>Колличество</td>
                <td>{{ $sku->count }}</td>
            </tr>
            </tbody>
        </table>
    </div>

@endsection

