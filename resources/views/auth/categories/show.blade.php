@php use Illuminate\Support\Facades\Storage; @endphp
@extends('layouts.admin')
@section('title',  'Категория: '. $category->name )

@section('content')
    <div class="container">
        <h2 class="text-center mb-3">{{ $category->name }}</h2>
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
                <td>{{ $category->id }}</td>
            </tr>
            <tr>
                <td>Код</td>
                <td>{{ $category->code }}</td>
            </tr>
            <tr>
                <td>Название</td>
                <td>{{ $category->name }}</td>
            </tr>
            <tr>
                <td>Название En</td>
                <td>{{ $category->name_en }}</td>
            </tr>
            <tr>
                <td>Описание</td>
                <td>{{ $category->description }}</td>
            </tr>
            <tr>
                <td>Описание En</td>
                <td>{{ $category->description_en }}</td>
            </tr>
            <tr>
                <td>Картинка</td>
                <td><img src="{{Storage::url($category->image)}}" alt="" height="240px"></td>
            </tr>
            <tr>
                <td>Кол-во товаров</td>
                <td>{{ $category->products->count() }}</td>
            </tr>
            </tbody>
        </table>
    </div>

@endsection

