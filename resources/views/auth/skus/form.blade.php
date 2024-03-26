@extends('layouts.admin')

@isset($sku)
    @section('title',  'Редактировать Sku ' . $sku->name)
@else
    @section('title',  'Добавить Sku' )
@endisset

@section('content')
    <div class="container">
        <h2 class="text-center mb-3">{{isset($sku) ? 'Редактировать Sku ' . $sku->name : 'Добавить Sku'}}</h2>
        <div class=" mx-auto">
            <form class="w-50 mx-auto" method="post"
                  @isset($sku)
                      action="{{ route('skus.update', [$product, $sku]) }}"
                  @else
                      action="{{ route('skus.store', $product) }}"
                @endisset
            >
                @isset($sku)
                    @method('PUT')
                @endisset
                @csrf
                <div class="mt-5">
                    <div class="row mb-3">
                        <div class="col-3">
                            Количество
                        </div>
                        <div class="col-9">
                            <input type="text" name="count" class="form-control"
                                   value="{{ isset($sku) ? $sku->count : old('count') }}">
                        </div>
                        @error('count')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row mb-3">
                        <div class="col-3">
                            Цена
                        </div>
                        <div class="col-9">
                            <input type="text" name="price" class="form-control"
                                   value="{{ isset($sku) ? $sku->price : old('price') }}">
                        </div>
                        @error('price')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    @foreach($product->properties as $property)
                        <div class="row mb-3">
                            <div class="col-3">
                                {{ $property->name }}
                            </div>
                            <div class="col-9">
                                <select class="form-select" name="property_id[{{ $property->id }}]"
                                        aria-label="Пример выбора по умолчанию">
                                @foreach($property->propertyOptions as $propertyOption)
                                        <option
                                            {{ isset($sku) && $sku->propertyOptions->contains($propertyOption->id) ? 'selected' : ''}}
                                            value="{{ $propertyOption->id }}">{{ $propertyOption->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
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

