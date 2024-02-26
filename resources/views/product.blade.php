@extends('layouts.master')
@section('title',  'Apple iPhone 15 256GB Black (MTP63)' )
@section('content')

    <div class="container">
        <h2 class="text-center mb-3">{{ $product->name }}</h2>
        <p class="text-center mb-3">Цена: <strong>{{ $product->price }} грн</strong></p>
        <div class=" mx-auto">
            <div class="card border-0">
                <img class=" img-fluid m-auto" src="{{asset('storage/images/iphone_15.png')}}" alt="dhd">
                <div class="card-body">
                    <p class="card-text text-center">{!! $product->description !!}</p>
                </div>
                <div class="mb-5 mx-auto">
                    <a href="{{ route('basket') }}" class="btn btn-success" type="btn">Добавить в корзину</a>
                </div>
            </div>
        </div>

    </div>
@endsection
