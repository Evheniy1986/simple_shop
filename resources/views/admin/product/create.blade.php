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
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <h3 class="text-center mb-4">Создание продукта</h3>
            <div class="">
                <form class="w-50 m-auto" action="{{ route('admin.products.store') }}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="inputPassword" class="col-form-label">Название</label>
                        <div class="">
                            @error('title')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <input type="text" name="title" value="{{ old('title') }}" class="form-control"
                                   id="inputPassword">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="inputPassword" class="col-form-label">Описание</label>
                        <div class="">
                            @error('description')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                            <textarea class="form-control summernote" name="description"
                                      id="exampleFormControlTextarea1" rows="3">{{ old('description') }}</textarea>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="inputPassword" class="col-form-label">Контент</label>
                        <div class="">
                            @error('content')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                            <textarea class="form-control summernote" name="content" id="exampleFormControlTextarea1"
                                      rows="3">{{ old('content') }}</textarea>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="inputPassword" class="col-form-label">Цена</label>
                        <div class="">
                            @error('price')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                            <input type="text" name="price" value="{{ old('price') }}" class="form-control"
                                   id="inputPassword">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="inputPassword" class="col-form-label">Колличество</label>
                        <div class="">
                            @error('count')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                            <input type="text" name="count" value="{{ old('count') }}" class="form-control"
                                   id="inputPassword">
                        </div>
                    </div>
                    @error('preview_image')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                    <div class=" mb-3 form-group">
                        <label for="exampleInputFile">Превью изображение</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="preview_image" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Выберите файл</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Загрузить</span>
                            </div>
                        </div>
                    </div>

                    @error('images')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                    <div class=" mb-3 form-group">
                        <label for="exampleInputFile">Основные изображение</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="images[]" class="custom-file-input" multiple id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Выберите файл</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Загрузить</span>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 mt-3">
                        <label for="category_id">Выберите категрию</label>
                        <select class="form-control" name="category_id" id="category_id">
                            <option disabled selected>Выберите категрию</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3 mt-3">
                        <label for="brand_id">Выберите бренд</label>
                        <select class="form-control" name="brand_id" id="brand_id">
                            <option disabled selected>Выберите бренд</option>
                            <!-- Бренды будут загружаться через jQuery -->
                        </select>
                    </div>


                    <div class="text-right mb-5">
                        <button class="btn btn-success" type="submit">Создать Продукт</button>
                    </div>
                </form>
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <script>


    </script>
@endsection

