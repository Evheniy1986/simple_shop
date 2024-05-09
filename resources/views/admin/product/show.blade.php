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
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a class="btn btn-primary" href="{{ route('admin.products.edit', $product) }}">Редактировать</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
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
                                <td>Картинка</td>
                                <td><img src="{{ asset('storage/'.$product->preview_image) }}" alt=""></td>
                            </tr>
                            <tr>
                                <td>Описание</td>
                                <td>{{ $product->description }}</td>
                            </tr>
                            <tr>
                                <td>Контент</td>
                                <td>{{ $product->content }}</td>
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
                                <td>{{ $product->is_published }}</td>
                            </tr>
                            <tr>
                                <td>Категория</td>
                                <td>{{ $product->category->title ?? '' }}</td>
                            </tr>
                            <tr>
                                <td>Тег</td>
                                @foreach($product->tags as $productTag)
                                <td>{{  $productTag->title }}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <td>Цвет</td>
                                @foreach($product->colors as $productColor)
                                   <td><div style="width: 16px; height: 16px; background: {{ '#' . $productColor->color }}"></div></td>
                                @endforeach
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
@endsection

