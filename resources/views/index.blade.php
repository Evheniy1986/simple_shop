@extends('layouts.master')
@section('title', 'Все Товары')
@section('content')
    <div class="container">
        <h2 class="text-center mb-3">Все Товары</h2>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @foreach($products as $product)
                @include('includes.card', compact('product'))
            @endforeach
        </div>
    </div>
@endsection
