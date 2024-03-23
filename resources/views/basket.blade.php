@extends('layouts.master')
@section('title',  'Корзина' )
@section('content')

    <div class="container">
        <h2 class="text-center mb-5">Корзина</h2>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Название</th>
                <th scope="col">Количество</th>
                <th scope="col">цена</th>
                <th scope="col">общая стоимость</th>
            </tr>
            </thead>
            <tbody>
            @foreach($order->products as $product)
                <tr>
                    <td><img class="card-img-top img-fluid m-auto" style="width: 3rem"
                             src="{{ \Illuminate\Support\Facades\Storage::url($product->image) }}" alt="dhd">
                        <a href="{{ route('product', [$product->category->code, $product->code]) }}">{{ $product->name }}</a>
                    </td>
                    <td><span class="badge text-bg-secondary">{{ $product->countInOrder }}</span>
                        <div class="btn-group">
                            <form action="{{ route('basket-remove', $product) }}" method="post">
                                @csrf
                                <button class="btn btn-danger" type="submit">-</button>
                            </form>
                            <form action="{{ route('basket-add', $product) }}" method="post">
                                @csrf
                                <button class="btn btn-success" type="submit">+</button>
                            </form>
                        </div>
                    </td>
                    <td>{{ $product->price }} {{ $currencySymbol }}</td>
                    <td>{{ $product->price * $product->countInOrder }} {{ $currencySymbol }}</td>
                </tr>
            @endforeach

            <tr>
                <td colspan="3">обшая стоимость</td>
                <td>{{ $order->getFullSum() }} {{ $currencySymbol }}</td>
            </tr>
            </tbody>
        </table>
        <a type="btn" class="btn btn-success float-md-end mt-4" href="{{ route('basket-place') }}">Оформить заказ</a>
    </div>
@endsection

