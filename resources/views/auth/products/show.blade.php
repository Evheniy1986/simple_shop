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
                <td>Название En</td>
                <td>{{ $product->name_en }}</td>
            </tr>
            <tr>
                <td>Описание</td>
                <td>{{ $product->description }}</td>
            </tr>
            <tr>
                <td>Описание En</td>
                <td>{{ $product->description_en }}</td>
            </tr>
            <tr>
                <td>Картинка</td>
                <td><img src="{{Storage::url($product->image)}}" alt="" height="240px"></td>
            </tr>
            <tr>
                <td>Категория</td>
                <td>{{ $product->category->name }}</td>
            </tr>
            <tr>
                <td>Количество</td>
                <td> шт.</td>
            </tr>
            <tr>
                <td>Лейблы</td>
                <td>
                    @if($product->new === 1)
                        <div class="">
                            <span class="badge text-bg-success">Новинка</span>
                        </div>
                    @endif
                    @if($product->recommend === 1)
                        <div class="">
                            <span class="badge text-bg-warning">Рекомендуемые</span>
                        </div>
                    @endif
                    @if($product->hit === 1)
                        <div class="">
                            <span class="badge text-bg-danger">Хит продаж</span>
                        </div>
                    @endif
                </td>
            </tr>
            </tbody>
        </table>
    </div>

@endsection

