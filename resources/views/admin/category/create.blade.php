@extends('layouts.main')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Категории</h1>
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
            <h3 class="text-center mb-4">Создание категории</h3>
            <div class="">
                <form action="{{ route('admin.categories.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Название</label>
                        <div class="col-sm-10">
                            @error('title')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <input type="text" name="title" value="{{ old('title') }}" class="form-control" id="inputPassword">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Описание</label>
                        <div class="col-sm-10">
                            @error('description')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{ old('description') }}</textarea>
                        </div>
                    </div>

                    @error('image')
                    <div class="text-danger">{{$message}}</div>
                    @enderror
                    <div class=" mb-3 form-group">
                        <label for="exampleInputFile">Вставьте изображение</label>
                        <div class="input-group">
                            <div class="custom-file">
                                @error('image')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                                <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Выберите файл</label>

                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-right mt-5">
                        <button class="btn btn-success" type="submit">Создать Категорию</button>
                    </div>
                </form>
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
@endsection

