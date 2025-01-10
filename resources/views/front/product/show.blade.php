@extends('layouts.frontMain')

@section('content')
    <main class="mt-5">
        <div class="container">
            <h2 class="text-center mb-3">{{ $product->title }}</h2>
            <p class="text-center mb-3">Цена: <strong>{{ number_format($product->price, 0, ',', ' ') }} грн</strong></p>
            <div class="mx-auto" style="max-width: 500px;">
                <div class="card border-0 product" data-product-id="{{ $product->id }}">
                    <img
                        class="img-fluid m-auto"
                        src="{{ \Illuminate\Support\Facades\Storage::url($product->preview_image) }}"
                        alt="{{ $product->title }}">
                    <div class="card-body">
                        <p class="card-text text-center">{!! $product->description !!}</p>
                    </div>
                    <div class="mb-5 mx-auto text-center">
                        <button
                            type="button"
                            class="btn btn-success add-to-cart"
                            data-product-id="{{ $product->id }}"
                            data-url="{{ route('basket.add') }}">
                            Добавить в корзину
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
