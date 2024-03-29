@extends('layouts.admin')

@isset($category)
    @section('title',  'Редактировать категорию ' . $category->name)
@else
    @section('title',  'Добавить категорию' )
@endisset

@section('content')
    <div class="container">
        <h2 class="text-center mb-3">{{isset($category) ? 'Редактировать категорию ' . $category->name : 'Добавить категорию'}}</h2>
        <div class=" mx-auto">
            <form class="w-50 mx-auto" enctype="multipart/form-data" method="post"
                  @isset($category)
                      action="{{ route('categories.update', $category) }}"
                  @else
                      action="{{ route('categories.store') }}"
                @endisset
            >
                @isset($category)
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
                                   value="{{ isset($category) ? $category->code : old('code') }}">
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
                                   value="{{ isset($category) ? $category->name : old('name') }}">
                        </div>
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <div class="col-3">
                            Название En
                        </div>
                        <div class="col-9">
                            <input type="text" name="name_en" class="form-control"
                                   value="{{ isset($category) ? $category->name_en : old('name_en') }}">
                        </div>
                        @error('name_en')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <div class="col-3">
                            Описание
                        </div>
                        <div class="col-9">
                                <textarea class="form-control" name="description" cols="30"
                                          rows="4">{{ isset($category) ? $category->description : old('description') }}</textarea>
                        </div>
                        @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <div class="col-3">
                            Описание En
                        </div>
                        <div class="col-9">
                                <textarea class="form-control" name="description_en" cols="30"
                                          rows="4">{{ isset($category) ? $category->description_en : old('description_en') }}</textarea>
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
                                   value="{{ isset($category) ? $category->image : old('image') }}">
                        </div>
                        @error('image')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <input class="btn btn-success float-end" type="submit" value="Сохранить">
                    </div>
                </div>
            </form>
        </div>

    </div>

@endsection

