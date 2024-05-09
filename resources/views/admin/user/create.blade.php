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
            <h3 class="text-center mb-4">Создание поьзователя</h3>
            <div class="">
                <form action="{{ route('admin.users.store') }}" method="post">
                    @csrf
                    <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Имя</label>
                        <div class="col-sm-10">
                            @error('name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="inputPassword">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">E-mail</label>
                        <div class="col-sm-10">
                            @error('email')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="inputPassword">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Пароль</label>
                        <div class="col-sm-10">
                            @error('password')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                            <input type="password" name="password" class="form-control" id="inputPassword">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Потверждение пароля</label>
                        <div class="col-sm-10">
                            @error('password_confirmation')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                            <input type="password" name="password_confirmation" class="form-control" id="inputPassword">
                        </div>
                    </div>
                    <div class="text-right mb-5">
                        <button class="btn btn-success" type="submit">Создать пользователя</button>
                    </div>
                </form>
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
@endsection

