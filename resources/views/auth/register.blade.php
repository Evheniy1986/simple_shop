
@extends('layouts.frontMain')

@section('content')


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <h3 class="text-center m-5">Регистрация</h3>
            <div class="">
                <form class="w-25 m-auto" action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="inputPassword" class="col-form-label">Имя</label>
                        <div class="">
                            @error('name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="inputPassword">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="inputPassword" class="col-form-label">E-mail</label>
                        <div class="">
                            @error('email')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="inputPassword">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="inputPassword" class="col-form-label">Пароль</label>
                        <div class="">
                            @error('password')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                            <input type="password" name="password" class="form-control" id="inputPassword">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="inputPassword" class="col-form-label">Потверждение пароля</label>
                        <div class="">
                            @error('password_confirmation')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                            <input type="password" name="password_confirmation" class="form-control" id="inputPassword">
                        </div>
                    </div>
                    <div class="mt-4 d-flex justify-content-between align-items-center">
                        <a class="text-decoration-none" href="{{ route('login') }}">Уже зарегистрированны</a>
                        <button class="btn btn-success " type="submit">Регистрация</button>
                    </div>
                </form>
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
@endsection

