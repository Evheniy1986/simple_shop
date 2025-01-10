@extends('layouts.frontMain')

@section('content')
    <main class="mt-5">
        <div class="container">
            <h2 class="text-center mb-3">Все Товары</h2>
            <div class="row row-cols-2 row-cols-lg-3 g-1 m-auto">
                @foreach($products as $product)
                    <div class="col product" data-product-id="{{ $product->id }}" style="width: 20rem;">
                        <div class="card shadow-sm">
                            <img class="card-img-top img-fluid"
                                 src="{{ \Illuminate\Support\Facades\Storage::url($product->preview_image) }}"
                                 alt="{{ $product->title }}">
                            <div class="card-body">
                                <p class="text-center">
                                    @if($product->category)
                                        <span>{{ $product->category->title }}</span>
                                    @endif
                                </p>
                                <h5 class="text-center">{{ $product->title }}</h5>
                                <p class="card-text text-center">
                                    Цена: {{ number_format($product->price, 0, ',', ' ') }} грн
                                </p>

                                <div class="d-flex justify-content-center">
                                    <button
                                        type="button"
                                        class="btn btn-primary me-2 add-to-cart"
                                        data-product-id="{{ $product->id }}"
                                        data-url="{{ route('basket.add') }}">
                                        В корзину
                                    </button>

                                    <a href="{{ route('product.show',  $product) }}"
                                       class="btn btn-outline-secondary">
                                        Подробнее
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>

@endsection
