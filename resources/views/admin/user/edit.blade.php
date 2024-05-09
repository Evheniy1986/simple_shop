@extends('layouts.main')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Пользователи</h1>
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
            <h3 class="text-center mb-4">Редактирование тег</h3>
            <div class="">
                <form action="{{ route('admin.users.update', $user) }}" method="post">
                    @method('put')
                    @csrf
                    <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Имя</label>
                        <div class="col-sm-10">
                            @error('name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <input type="text" name="name" value="{{ $user->name }}" class="form-control"
                                   id="inputPassword">
                        </div>
                    </div>
                    <div class="text-right mb-5">
                        <button class="btn btn-success" type="submit">Редактировать</button>
                    </div>
                </form>
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
@endsection

