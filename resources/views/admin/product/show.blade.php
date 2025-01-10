@extends('layouts.main')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Продукты</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header g-2">

                            <select class="custom-select form-control w-25" aria-label="Default select example" onchange="location = this.value;">
                                <option disabled selected>Добавить опцию к продукту</option>
                                <option value="{{ route('admin.values.create', $product) }}">Создать опцию для продукта</option>
                                <option value="{{ route('admin.values.edit', $product) }}">Редактировать опцию для продукта</option>
                                <option value="{{ route('admin.values.destroy', $product) }}">Удалить все опции для продукта</option>
                            </select>

                            <select class="custom-select form-control w-25" aria-label="Default select example" onchange="location = this.value;">
                                <option disabled selected>Добавить характеристику к продукту </option>
                                <option value="{{ route('admin.property_products.create', $product) }}">Создать характеристику для продукта</option>
                                <option value="{{ route('admin.property_products.edit', $product) }}">Редактировать характеристику для продукта</option>
                                <option value="{{ route('admin.property_products.destroy', $product) }}">Удалить все зарактеристики для продукта</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">

                            <tbody>
                            <tr>
                                <td>ID</td>
                                <td>{{ $product->id }}</td>
                            </tr>
                            <tr>
                                <td>Название</td>
                                <td>{{ $product->title }}</td>
                            </tr>
                            <tr>
                                <td>Превью</td>
                                <td><img style="width: 200px; height: 200px;"
                                         src="{{ asset('storage/'.$product->preview_image) }}" alt=""></td>
                            </tr>
                            <tr>
                                <td>Описание</td>
                                <td>{!! $product->description !!}</td>
                            </tr>
                            <tr>
                                <td>Контент</td>
                                <td>{!! $product->content !!}</td>
                            </tr>
                            <tr>
                                <td>Цена</td>
                                <td>{{ $product->price }}</td>
                            </tr>
                            <tr>
                                <td>Количество</td>
                                <td>{{ $product->count }}</td>
                            </tr>
                            <tr>
                                <td>Опубликованно</td>
                                <td>{{ $product->is_published == 1 ? 'Опубликованно' : 'Не Опубликованно' }}</td>
                            </tr>
                            <tr>
                                <td>Категория</td>
                                <td>{{ $product->category->title ?? '' }}</td>
                            </tr>
                            <tr>
                                <td>Картинки</td>
                                    <div class="d-flex flex-wrap gap-1 justify-content-center align-items-center">
                                        @foreach($product->images as $image)
                                        <td><img class="rounded" style="width: 200px; height: 200px; object-fit: cover;"
                                                 src="{{ asset('storage/'.$image->image_path) }}" alt=""></td>
                                        @endforeach
                                    </div>
                            </tr>

                            <tr>
                                @foreach($product->optionValues as $value)
                                    <td>{{ $value->option->title ?? 'Без названия' }} : {{ $value->value ?? 'Без значения' }}</td>
                                @endforeach
                            </tr>


                            <tr>
                                @foreach($product->properties as $property)
                                    <td>{{ $property->name ?? 'Без названия' }} : {{ $property->pivot->value ?? 'Без значения' }}</td>
                                @endforeach
                            </tr>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

