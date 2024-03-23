@extends('layouts.master')
@section('title',  'Подтверждение заказа' )
@section('content')

    <div class="container">
        <h2 class="text-center mb-3">Подтверждение заказа</h2>
        <p class="text-center mb-3">Общая стоимость: <strong>{{ $order->getFullSum() }} {{ $currencySymbol }}</strong></p>
        <div class=" mx-auto">
            <form class="w-50 mx-auto" action="{{ route('basket-confirm') }}" method="post">
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
                            Номер телефона
                        </div>
                        <div class="col-9">
                            <input type="text" name="phone" class="form-control">
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
                    <div>
                        <input class="btn btn-success float-end" type="submit" value="Подтвердить ваш заказ">
                    </div>
                </div>
            </form>
        </div>

    </div>
@endsection

