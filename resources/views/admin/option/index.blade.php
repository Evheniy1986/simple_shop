@extends('layouts.main')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Опции</h1>
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
                        <div class="card-header">
                            <a class="btn btn-primary" href="{{ route('admin.options.create') }}">Добавить</a>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Имя</th>
                                <th>Роль</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($options as $option)
                                <tr>
                                    <td>{{ $option->id }}</td>
                                    <td>
                                        <a href="{{route('admin.options.show', $option)}}">{{ $option->title }}</a>
                                    </td>

{{--                                    <td>--}}
{{--                                        {{ $option->email }}--}}
{{--                                    </td>--}}
                                        <td class="btn-group">
                                            <a class="btn btn-info" href="{{ route('admin.options.edit', $option) }}">Редактировать</a>


                                            <form action="{{ route('admin.options.destroy', $option) }}" method="post">
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

