@extends('layouts.master')
@section('title',  'Apple iPhone 15 256GB Black (MTP63)' )
@section('content')

    <div class="container">
        <h2 class="text-center mb-3">{{ $sku->product->__('name') }}</h2>
        <h4 class="text-center mb-3">{{ $sku->product->category->__('name') }}</h4>
        <p class="text-center mb-3">Цена: <strong>{{ $sku->price }} {{ $currencySymbol }}</strong></p>
        @isset($sku->product->properties)
            @foreach($sku->propertyOptions as $propertyOption)
                <h5 class="text-center">{{ $propertyOption->property->__('name') }} : {{ $propertyOption->__('name') }}</h5>
            @endforeach
        @endisset
        <div class=" mx-auto">
            <div class="card border-0">
                <img height="240px" class=" m-auto" src="{{\Illuminate\Support\Facades\Storage::url($sku->product->image)}}"
                     alt="dhd">
                <div class="card-body">
                    <p class="card-text text-center">{!! $sku->product->__('description') !!}</p>
                </div>
                <div class="mx-auto mt-4">
                    @if($sku->isAvailable())
                        <form action="{{ route('basket-add', $sku->product) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-success">Добавить в корзину</button>
                            @else
                                <span class="text-danger">Товар не доступен</span>
                                <br>
                                <span>Сообщить мне когда появиться</span>
                                <form class="mt-3" action="{{ route('subscription', $sku) }}" method="post">
                                    @csrf
                                    <input class="" type="text" name="email">
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
