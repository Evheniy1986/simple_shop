@extends('layouts.admin')

@isset($property)
    @section('title',  'Редактировать свойство ' . $property->name)
@else
    @section('title',  'Добавить свойство' )
@endisset

@section('content')
    <div class="container">
        <h2 class="text-center mb-3">{{isset($property) ? 'Редактировать свойство ' . $property->name : 'Добавить свойство'}}</h2>
        <div class=" mx-auto">
            <form class="w-50 mx-auto" method="post"
                  @isset($property)
                      action="{{ route('properties.update', $property) }}"
                  @else
                      action="{{ route('properties.store') }}"
                @endisset
            >
                @isset($property)
                    @method('PUT')
                @endisset
                @csrf
                <div class="mt-5">
                    <div class="row mb-3">
                        <div class="col-3">
                            Название
                        </div>
                        <div class="col-9">
                            <input type="text" name="name" class="form-control"
                                   value="{{ isset($property) ? $property->name : old('name') }}">
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
                                   value="{{ isset($property) ? $property->name_en : old('name_en') }}">
                        </div>
                        @error('name_en')
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

