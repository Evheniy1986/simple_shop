@extends('layouts.admin')
@section('title',  'Заказы' )

@section('content')
    <div class="container">
        <h2 class="text-center mb-3">Заказы</h2>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Имя</th>
                <th scope="col">E-mail</th>
                <th scope="col">Телефон</th>
                <th scope="col">Когда отрпавлен</th>
                <th scope="col">Сумма</th>
                <th scope="col">Действие</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <th scope="row">{{ $order->id }}</th>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->created_at->format('H:i d/m/Y') }}</td>
                    <td>{{ $order->getTotal() }} грн</td>
                    <td>
                        @if(auth()->user()->isAdmin())
                        <a href="{{ route('orders.show', $order) }}" class="btn btn-success">Открыть</a>
                        @else
                            <a href="{{ route('person.orders.show', $order) }}" class="btn btn-success">Открыть</a>

                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
