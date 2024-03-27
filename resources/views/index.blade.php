@extends('layouts.master')
@section('title', 'Все Товары')
@section('content')
    <div class="container">
        <h2 class="text-center mb-3">Все Товары</h2>
        <form action="{{ route('index') }}" method="get">
            <div class="row mb-4">
                <div class="col-sm-2 col-md-2">
                    <label for="price_from">Цена от:
                        <input type="text" class="" value="{{  request()->price_from }}" name="price_from" id="price_from" size="6">
                    </label>
                </div>
                <div class="col-sm-2 col-md-2">
                    <label for="price_to">До:
                        <input type="text" name="price_to" value="{{  request()->price_to  }}" id="price_to" size="6">
                    </label>
                </div>
                <div class="col-sm-2 col-md-2">
                    <label for="hit">
                        <input type="checkbox" name="hit" @if(request()->has('hit')) checked @endif id="hit" size="6"> {{ __('main.properties.hit') }}
                    </label>
                </div>
                <div class="col-sm-2 col-md-2">
                    <label for="new">
                        <input type="checkbox" name="new" @if(request()->has('new')) checked @endif id="new" size="6"> {{ __('main.properties.new') }}
                    </label>
                </div>
                <div class="col-sm-2 col-md-2">
                    <label for="recommend">
                        <input type="checkbox" name="recommend" @if(request()->has('recommend')) checked @endif id="recommend" size="6"> {{ __('main.properties.recommend') }}
                    </label>
                </div>
                <div class="col-sm-2 col-md-2">
                    <button type="submit" class="btn btn-primary">Фильтр</button>
                    <a href="{{ route('index') }}" class="btn btn-warning">Сброс</a>
                </div>
            </div>
        </form>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 mx-auto">
            @foreach($skus as $sku)
                @include('includes.card', compact('sku'))
            @endforeach
        </div>
        <div class="mt-5 mx-auto">
            {{ $skus->links() }}
        </div>
    </div>
@endsection
