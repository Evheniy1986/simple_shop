@extends('layouts.master')
@section('title',  $category->name )
@section('content')
    <div class="container">
        <h2 class="text-center mb-3">{{ $category->name }}</h2>
        <p class="text-center">{{ $category->description }}</p>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @foreach($category->products->map->skus->flatten() as $sku)
                @include('includes.card', compact('sku'))
            @endforeach
        </div>
    </div>

@endsection
