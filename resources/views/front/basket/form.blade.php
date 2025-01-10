@extends('layouts.frontMain')
@section('content')
    <main class="mt-5">
        <div class="container">
            <h2 class="text-center mb-3">Подтверждение заказа</h2>
            <p class="text-center mb-3">Общая стоимость: <strong>{{ $totalSum }} грн</strong></p>
            <div class=" mx-auto">
                <form class="w-50 mx-auto" action="{{ route('confirm.cart') }}" method="post">
                    @csrf
                    <div class="mt-5">
                        <div class=""></div>
                        <div class="row mb-3">
                            <div class="col-3">
                                Имя
                            </div>
                            <div class="col-9">
                                <input type="text" name="first_name" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-3">
                                Фамилия
                            </div>
                            <div class="col-9">
                                <input type="text" name="last_name" class="form-control">
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
                                Номер телефона
                            </div>
                            <div class="col-9">
                                <input type="text" name="phone" class="form-control">

                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-3">
                                Город
                            </div>
                            <div class="col-9">
                                <input type="text" name="city" class="form-control city_name">
                                <ul class="cityList"></ul>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-3">
                                Отделение
                            </div>
                            <div class="col-9">
                                <input type="text" name="warehouse" class="form-control warehouse">
                                <ul class="warehouseList"></ul>
                            </div>
                        </div>

                        <div class="row m-3">
                            <h3 class="m-3">Выберите способ доставки</h3>
                        </div>

                        <div class="form-check mb-2 col-9">
                            <input class="form-check-input" type="radio" name="warehouse_status[]"
                                   id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Отделение Новой Почты
                            </label>
                        </div>
                        <div class="form-check mb-3">

                            <input class="form-check-input" type="radio" name="warehouse_status[]"
                                   id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Новая Почта(почтомат)
                            </label>
                        </div>

                        <div class="row mb-3">
                            <div class="col-3">
                                Выберите город
                            </div>
                            <div class="col-9">
                                <select class="form-select mb-3 cityName" name="city" aria-label="Default select example">

                                    <option selected></option>

                                            <option value="1"></option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-3">
                                Выберите отделение
                            </div>
                            <div class="col-9 city">
                                <select class="form-select mb-3" name="number_post" aria-label="Default select example">
                                    <option selected></option>
                                    <option value="1">One</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-3">
                                Добавьте описание к заказу
                            </div>
                            <div class="col-9">
                                <textarea class="form-control" name="" id="" cols="10" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="mb-5">
                            <input class="btn btn-success float-end mb-5" type="submit" value="Подтвердить ваш заказ">
                        </div>
                </form>
            </div>
        </div>
    </main>
@endsection
