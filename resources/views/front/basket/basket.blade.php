@extends('layouts.frontMain')
@section('content')
    <main class="mt-5">
        <div class="container">
            <h2 class="text-center mb-5">Корзина</h2>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Название</th>
                    <th scope="col">Количество</th>
                    <th scope="col">Цена</th>
                    <th scope="col">Общая стоимость</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    @if($product->qty && $product->qty > 0)
                        <tr data-product-id="{{ $product->id }}">

                            <td>
                                <img class="card-img-top img-fluid m-auto" style="width: 3rem"
                                     src="{{ \Illuminate\Support\Facades\Storage::url($product->preview_image) }}"
                                     alt="{{ $product->title }}">
                                <a href="{{ route('product.show',  $product) }}">{{ $product->title }}</a>
                            </td>
                            <td>
                            <span class="badge text-bg-secondary qty"
                                  data-product-id="{{ $product->id }}">{{ $product->qty }}</span>
                                <div class="btn-group">
                                    <form action="{{ route('basket.removeQuantity') }}" method="post" class="d-inline">
                                        @csrf
                                        <button class="btn btn-danger removeQuantity" data-product-id="{{ $product->id }}" type="submit">-</button>
                                    </form>
                                    <form action="{{ route('basket.addQuantity') }}" method="post" class="d-inline">
                                        @csrf
                                        <button class="btn btn-success addQuantity" data-product-id="{{ $product->id }}" type="submit">+</button>
                                    </form>
                                </div>
                            </td>
                            <td>{{ number_format($product->price, 0, ',', ' ') }} грн</td>
                            <td class="all-price" data-product-id="{{ $product->id }}">
                                {{ number_format($product->price * (int) $product->qty, 0, ',', ' ') }} грн
                            </td>
                        </tr>
                    @endif
                @endforeach
                <tr>
                    <th>Общая стоимость</th>
                    <th></th>
                    <th></th>
                    <th class="total-sum">{{ number_format($totalSum, 0, ',', ' ') }} грн</th>
                </tr>
                </tbody>
            </table>
            <a class="btn btn-success float-md-end mt-4" href="{{ route('basket.form') }}">Оформить заказ</a>
        </div>
    </main>

@endsection
