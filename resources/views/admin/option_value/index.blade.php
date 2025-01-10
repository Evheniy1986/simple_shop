@extends('layouts.main')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Свойство опции</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Категории</li>
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
                            <a class="btn btn-primary" href="{{ route('admin.option-values.create') }}">Добавить</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Название</th>
                                <th>Свойство</th>
                                <th rowspan="3">Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($optionValues as $optionValue)
                                <tr>
                                    <td>{{ $optionValue->id }}</td>
                                    <td>
                                        <a href="{{route('admin.option-values.show', $optionValue)}}">{{ $optionValue->option->title }}</a>
                                    </td>
                                    <td>
                                        {{ $optionValue->value }}
                                    </td>

                                        <td class="btn-group">
                                            <a class="btn btn-info" href="{{ route('admin.option-values.edit', $optionValue->id) }}">Редактировать</a>


                                            <form action="{{ route('admin.option-values.destroy', $optionValue) }}" method="post" onsubmit="return confirm('Вы уверены, что хотите удалить этот бренд?');">
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

