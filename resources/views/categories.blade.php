@extends('layouts.master')
@section('title', 'Все категории')
@section('content')

    <div class="container">
        <h2 class="text-center mb-5">Все категории</h2>
        @foreach($categories as $category)
            <div class=" mx-auto">
                <div class="card border-0">
                    <img class="card-img-top img-fluid m-auto" style="width: 3rem"
                         src="{{\Illuminate\Support\Facades\Storage::url($category->image)}}" alt="dhd">
                    <div class="card-body">
                        <a href="{{ route('category', $category->code) }}"><h5
                                class="text-center border-0">{{ $category->name }}</h5></a>
                        <p class="card-text text-center">{{ $category->description }}</p>
                        <hr>
                    </div>
                </div>
            </div>
        @endforeach
        @endsection
    </div>

