@extends('layouts.master')
@section('title',  'Apple iPhone 15 256GB Black (MTP63)' )
@section('content')

    <div class="container">
        <h2 class="text-center mb-3">{{ $product->name }}</h2>
        <h4 class="text-center mb-3">{{ $product->category->name }}</h4>
        <p class="text-center mb-3">Цена: <strong>{{ $product->price }} грн</strong></p>
        <div class=" mx-auto">
            <div class="card border-0">
                <img height="240px" class=" m-auto" src="{{\Illuminate\Support\Facades\Storage::url($product->image)}}"
                     alt="dhd">
                <div class="card-body">
                    <p class="card-text text-center">{!! $product->description !!}</p>
                </div>
                <div class="mx-auto mt-4">
                    @if($product->isAvailable())
                        <form action="{{ route('basket-add', $product) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-success">Добавить в корзину</button>
                            @else
                                <span class="text-danger">Товар не доступен</span>
                                <br>
                                <span>Сообщить мне когда появиться</span>
                                <form action="{{ route('subscription', $product) }}" method="post">
                                    @csrf
                                    <input class="mb-3 mt-3" type="text" name="email">
                                    <button class="btn btn-primary" type="submit">Отправить</button>
                                </form>
                                @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            @endif
                        </form>
                </div>
            </div>
        </div>

    </div>
@endsection
