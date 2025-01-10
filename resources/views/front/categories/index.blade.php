@extends('layouts.frontMain')

@section('content')
    <main class="mt-5">
        <div class="container">
            <h2 class="text-center mb-5">Все категории</h2>
            <div class=" mx-auto">
                @foreach($categories as $category)
                    <div class="card border-0">
                        <img class="card-img-top img-fluid m-auto" style="width: 3rem" src="{{ \Illuminate\Support\Facades\Storage::url($category->image) }}"
                             alt="{{ $category->title }}">
                        <div class="card-body">
                            <a href="{{ route('categories.show', $category->slug) }}"><h5 class="text-center border-0">{{ $category->title }}</h5></a>
                            <p class="card-text text-center">{{ $category->description }}</p>
                            <hr>
                        </div>
                    </div>
            </div>
            @endforeach
        </div>
    </main>
@endsection
