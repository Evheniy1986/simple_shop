@php use Illuminate\Support\Facades\Storage; @endphp
@extends('layouts.admin')
@section('title',  'Товар: '. $product->name )

@section('content')
    <div class="container">
        <h2 class="text-center mb-3">{{ $product->name }}</h2>
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
                <td>{{ $product->id }}</td>
            </tr>
            <tr>
                <td>Код</td>
                <td>{{ $product->code }}</td>
            </tr>
            <tr>
                <td>Название</td>
                <td>{{ $product->name }}</td>
            </tr>
            <tr>
                <td>Описание</td>
                <td>{{ $product->description }}</td>
            </tr>
            <tr>
                <td>Картинка</td>
                <td><img src="{{Storage::url($product->image)}}" alt="" height="240px"></td>
            </tr>
            <tr>
                <td>Категория</td>
                <td>{{ $product->category->name }}</td>
            </tr>
            </tbody>
        </table>
    </div>

@endsection

