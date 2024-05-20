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
                    <th scope="col">цена</th>
                    <th scope="col">общая стоимость</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    @if($product->qty && $product->qty > 0)
                        <tr data-product-id="{{$product->id}}">

                            <td><img class="card-img-top img-fluid m-auto" style="width: 3rem"
                                     src="{{ \Illuminate\Support\Facades\Storage::url($product->preview_image) }}"
                                     alt="dhd">
                                <a href="#">{{ $product->title }}</a>
                            </td>
                            <td><span class="badge text-bg-secondary qty"
                                      data-product-id="{{$product->id}}">{{ $product->qty }}</span>
                                <div class="btn-group">
                                    <form action="{{ route('basket.removeQuantity', $product) }}" method="post">
                                        @csrf
                                        <button class="btn btn-danger removeQuantity" data-product-id="{{$product->id}}"
                                                type="submit">-
                                        </button>
                                    </form>
                                    <form action="{{ route('basket.addQuantity', $product->id) }}" method="post">
                                        @csrf
                                        <button class="btn btn-success addQuantity" data-product-id="{{$product->id}}"
                                                type="submit">+
                                        </button>
                                    </form>
                                </div>
                            </td>
                            <td>{{ $product->price }} грн</td>
                            <td class="all-price"
                                data-product-id="{{$product->id}}">{{ $product->price * $product->qty }}
                                грн
                            </td>
                        </tr>
                    @endif
                @endforeach
                <tr>
                    <th>обшая стоимость</th>
                    <th></th>
                    <th></th>
                    <th class="total-sum">{{$totalSum}} грн</th>
                </tr>
                </tbody>
            </table>
            <input type="submit" class="btn btn-success float-md-end mt-4" value="Оформить заказ">
        </div>
    </main>
@endsection
