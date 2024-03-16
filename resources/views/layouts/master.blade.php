<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    />

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/35689621a5.js" crossorigin="anonymous"></script>

    {{--    @vite(['resources/js/app.js'])--}}

    <title>@yield('title')</title>
</head>
<body>
<nav class="bg-dark  navbar navbar-dark navbar-expand-lg">
    <div class="container">
        <div class="collapse navbar-collapse d-flex justify-content-around ">
            <ul class="navbar-nav">
                <li class="active">
                    <a class="nav-link"
                       href="{{ route('index') }}">{{ __('main.online_shop') }}</a>
                </li>
                <li class="nav-item ">
                    <a @routeactive('index') href="{{ route('index') }}">@lang('main.all_products')</a>
                </li>
                <li class="nav-item ">
                    <a @routeactive('categor*') href="{{ route('categories') }}">Категории</a>
                </li>
                <li class="nav-item ">
                    <a @routeactive('basket*') href="{{ route('basket') }}">Корзина</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('reset') }}">Сбросить проект в начальное состояние</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('locale', __('main.set_lang')) }}">@lang('main.set_lang')</a>
                </li>
                <li class="nav-item dropdown">
                    <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ \App\Services\CurrencyConversion::getCurrencySymbol() }}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        @foreach(\App\Services\CurrencyConversion::getCurrencies() as $currency)
                            <li><a class="dropdown-item" href="{{ route('currency', $currency->code) }}">{{ $currency->symbol }}</a></li>
                        @endforeach

                    </ul>
                </li>
            </ul>
            <ul class="navbar-nav">
                @auth()
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('get-logout') }}">Выйти</a>
                    </li>
                    @if(auth()->user()->isAdmin())
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">Админ панель</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('person.orders.index') }}">Личный кабинет</a>
                        </li>
                    @endif
                @endauth

                @guest()
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Войти</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('register') }}">Зарегистрироваться</a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
<main class="mt-5">
    @if(session()->has('success'))
        <p class="alert alert-success text-center">{{ session()->get('success') }}</p>
    @endif
    @if(session()->has('warning'))
        <p class="alert alert-warning text-center">{{ session()->get('warning') }}</p>
    @endif
    @yield('content')
</main>
</body>
</html>

