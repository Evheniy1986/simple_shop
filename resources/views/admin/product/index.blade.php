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
                            <a class="btn btn-primary" href="{{ route('admin.products.create') }}">Добавить</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Название</th>
                                <th>Картинка</th>
                                <th>Описание</th>
                                <th>Контент</th>
                                <th rowspan="3">Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>
                                        <a href="{{route('admin.products.show', $product)}}">{{ $product->title }}</a>
                                    </td>
                                    <td>
                                        <img style="height: 70px; width: 70px;" src="{{ \Illuminate\Support\Facades\Storage::url( $product->preview_image) }}" alt="{{ $product->title }}">
                                    </td>
                                    <td>
                                        {{ $product->description }}
                                    </td>
                                    <td>
                                        {{ $product->content }}
                                    </td>
                                        <td class="btn-group">
                                            <a class="btn btn-info" href="{{ route('admin.products.edit', $product) }}">Редактировать</a>


                                            <form action="{{ route('admin.products.destroy', $product) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger" type="submit">Удалить</button>
                                            </form>
                                        </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
@endsection

