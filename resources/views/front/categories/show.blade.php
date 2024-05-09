@extends('layouts.frontMain')
@section('content')
<main class="mt-5">
    <div class="container">
        <h2 class="text-center mb-5">{{ $category->title }}</h2>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @foreach($category->products as $product)
                <div class="col" style="width: 20rem">
                <div class="card shadow-sm">
                    <img class="card-img-top img-fluid" src="{{ \Illuminate\Support\Facades\Storage::url($product->preview_image) }}" alt="{{ $product->title }}">
                    <div class="card-body">
                        <h5 class="text-center">{{ $product->title }}</h5>
                        <p class="card-text text-center">Цена: {{ $product->price }} грн</p>

                        <div class="d-flex justify-content-center">
                            <div class="me-2">
                                <button type="button" class="btn btn-primary">В корзину</button>
                            </div>
                            <div>
                                <a href="{{ route('product.show', [$category->code, $product->id]) }}" type="button" class="btn btn-outline-secondary">Подробнее</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</main>
@endsection
