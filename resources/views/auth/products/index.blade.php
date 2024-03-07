@extends('layouts.admin')
@section('title',  'Товары' )

@section('content')
    <div class="container">
        <h2 class="text-center mb-3">Товары</h2>
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Код</th>
                <th scope="col">Название</th>
                <th scope="col">Категория</th>
                <th scope="col">Цена</th>
                <th scope="col">Количество</th>
                <th scope="col">Действие</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <th scope="row">{{ $product->id }}</th>
                    <td>{{mb_substr($product->code, 0, 20) }}</td>
                    <td>{{ mb_substr($product->name, 0, 30) }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->count }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <form action="{{ route('products.destroy', $product) }}" method="post">
                                @csrf
                                <a class="btn btn-success btn-sm" role="button" href="{{ route('products.show', $product) }}">Открыть</a>
                                <a class="btn btn-warning btn-sm" role="button" href="{{ route('products.edit', $product->id) }}">Редактировать</a>
                                @method('delete')
                                <input class="btn btn-danger btn-sm" type="submit" value="Удалить">

                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a class="btn bg-success" type="button" href="{{ route('products.create') }}">Добавить товар</a>
        {{ $products->links() }}
    </div>

@endsection

