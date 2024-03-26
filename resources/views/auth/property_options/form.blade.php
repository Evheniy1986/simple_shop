@extends('layouts.admin')

@isset($propertyOption)
    @section('title',  'Редактировать вариант свойства ' . $propertyOption->name)
@else
    @section('title',  'Добавить вариант свойства' )
@endisset

@section('content')
    <div class="container">
        <h2 class="text-center mb-3">{{isset($propertyOption) ? 'Редактировать вариант свойства ' . $propertyOption->name : 'Добавить вариант свойства'}}</h2>
        <div class=" mx-auto">
            <form class="w-50 mx-auto" method="post"
                  @isset($propertyOption)
                      action="{{ route('property-options.update', [$property, $propertyOption]) }}"
                  @else
                      action="{{ route('property-options.store', $property) }}"
                @endisset
            >
                @isset($propertyOption)
                    @method('PUT')
                @endisset
                @csrf
                    <div>
                        <h2 class="text-center">Свойство {{ $property->name }}</h2>
                    </div>
                <div class="mt-5">
                    <div class="row mb-3">
                        <div class="col-3">
                            Название
                        </div>
                        <div class="col-9">
                            <input type="text" name="name" class="form-control"
                                   value="{{ isset($propertyOption) ? $propertyOption->name : old('name') }}">
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
                                   value="{{ isset($propertyOption) ? $propertyOption->name_en : old('name_en') }}">
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

