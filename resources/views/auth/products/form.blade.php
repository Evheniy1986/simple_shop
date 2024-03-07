@extends('layouts.admin')

@isset($product)
    @section('title',  'Редактировать товар ' . $product->name)
@else
    @section('title',  'Добавить товар' )
@endisset

@section('content')
    <div class="container">
        <h2 class="text-center mb-3">{{isset($product) ? 'Редактировать товар ' . $product->name : 'Добавить товар'}}</h2>
        <div class=" mx-auto">
            <form class="w-50 mx-auto" enctype="multipart/form-data" method="post"
                  @isset($product)
                      action="{{ route('products.update', $product) }}"

                  @else
                      action="{{ route('products.store') }}"
                @endisset
            >
                @isset($product)
                    @method('PUT')
                @endisset
                @csrf
                <div class="mt-5">
                    <div class="row mb-3">
                        <div class="col-3">
                            Код
                        </div>
                        <div class="col-9">
                            <input type="text" name="code" class="form-control"
                                   value="{{ isset($product) ? $product->code : old('code') }}">
                        </div>
                        @error('code')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row mb-3">
                        <div class="col-3">
                            Название
                        </div>
                        <div class="col-9">
                            <input type="text" name="name" class="form-control"
                                   value="{{ isset($product) ? $product->name : old('name') }}">
                        </div>
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <div class="col-3">
                            Категория
                        </div>
                        <div class="col-9">
                                <select class="form-select" name="category_id" aria-label="Пример выбора по умолчанию">
                                    @foreach($categories as $category)
                                    <option {{ isset($product) && $product->category_id == $category->id ? 'selected' : ''}}
                                            value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            @error('category_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-3">
                            Описание
                        </div>
                        <div class="col-9">
                                <textarea class="form-control" name="description" cols="30"
                                          rows="4">{{ isset($product) ? $product->description : old('description') }}</textarea>
                        </div>
                        @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <div class="col-3">
                            Картинка
                        </div>
                        <div class="col-9">
                            <input type="file" name="image" class="form-control"
                                   value="{{ isset($product) ? $product->image : old('image') }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-3">
                            Цена
                        </div>
                        <div class="col-9">
                            <input type="text" name="price" class="form-control"
                                   value="{{ isset($product) ? $product->price : old('price') }}">
                        </div>
                        @error('price')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <div class="col-3">
                            Количество
                        </div>
                        <div class="col-9">
                            <input type="number" name="count" class="form-control"
                                   value="{{ isset($product) ? $product->count : old('count') }}">
                        </div>
                        @error('price')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    @foreach(['hit' => 'Хит', 'new' => 'Новинка', 'recommend' => 'Рекомендуемые'] as $field => $title)
                        <div class="row mb-3">
                            <div class="col-3">
                                {{ $title }}
                            </div>
                            <div class="col-9">
                                <input type="checkbox" name="{{ $field }}" class="form-check-input"
                                       {{ isset($product) && $product->$field == 1 ? 'checked' : '' }}>
                            </div>
                            @error($field)
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    @endforeach
                    <div>
                        <input class="btn btn-success float-end" type="submit" value="Сохранить">
                    </div>
                </div>
            </form>
        </div>

    </div>

@endsection

