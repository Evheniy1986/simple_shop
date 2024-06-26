@extends('layouts.frontMain')

@section('content')
    <main class="mt-5">
        <div class="container">
            <h2 class="text-center mb-3">{{ $product->title }}</h2>
            <p class="text-center mb-3">Цена: <strong>{{ $product->price }} грн</strong></p>
            <div class=" mx-auto">
                <div class="card border-0 product" data-product-id="{{ $product->id }}">
                    <img class=" img-fluid m-auto" src="{{ \Illuminate\Support\Facades\Storage::url($product->preview_image) }}" alt="{{ $product->title }}">
                    <div class="card-body">
                        <p class="card-text text-center">{{ $product->description }}</p>
                    </div>
                    <div class="mb-5 mx-auto">
                        <a href="{{ route('basket.add') }}" type="submit" class="btn btn-success add-to-cart">Добавить в корзину</a>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
