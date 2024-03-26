@extends('layouts.admin')
@section('title',  'Товарные предложения' )

@section('content')
    <div class="container">
        <h2 class="text-center mb-3">Товарные предложения</h2>
        <h2 class="text-center mb-3">{{ $product->name }}</h2>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Название</th>
                <th scope="col">Количество</th>
                <th scope="col">Цена</th>
                <th scope="col">Действие</th>
            </tr>
            </thead>
            <tbody>
            @foreach($skus as $sku)
                <tr>
                    <th scope="row">{{ $sku->id }}</th>
                    <td>{{ $sku->propertyOptions->map->name->implode(', ') }}</td>
                    <td>{{ $sku->count }}</td>
                    <td>{{ $sku->price }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <form action="{{ route('skus.destroy', [$product, $sku]) }}" method="post">
                                @csrf
                                <a class="btn btn-success" href="{{ route('skus.show', [$product, $sku]) }}">Открыть</a>
                                <a class="btn btn-warning" href="{{ route('skus.edit', [$product, $sku]) }}">Редактировать</a>
                                @method('delete')
                                <input class="btn btn-danger" type="submit" value="Удалить">

                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a class="btn bg-success" type="button" href="{{ route('skus.create', $product) }}">Добавить Sku</a>
        {{ $skus->links() }}
    </div>

@endsection

