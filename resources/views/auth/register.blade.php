@extends('layouts.admin')
@section('title',  'Регистрация' )

@section('content')
    <div class="container">
        <h2 class="text-center mb-3">Регистрация</h2>
        <div class=" mx-auto">
            <form class="w-50 mx-auto" action="{{ route('register') }}" method="post">
                @csrf
                <div class="mt-5">
                    <div class="row mb-3">
                        <div class="col-3">
                            Имя
                        </div>
                        <div class="col-9">
                            <input type="text" name="name" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-3">
                            E-mail
                        </div>
                        <div class="col-9">
                            <input type="text" name="email" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-3">
                            Пароль
                        </div>
                        <div class="col-9">
                            <input type="password" name="password" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-3">
                           Подтвердите пароль
                        </div>
                        <div class="col-9">
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>
                    </div>

                    <div>
                        <input class="btn btn-primary float-end" type="submit" value="Войти">
                    </div>
            </form>
        </div>

    </div>

@endsection
