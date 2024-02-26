<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    />


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/35689621a5.js" crossorigin="anonymous"></script>


    <title>@yield('title')</title>
</head>
<body>
<nav class="bg-dark  navbar navbar-dark navbar-expand-lg">
    <div class="container">
        <div class="collapse navbar-collapse d-flex justify-content-around ">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('index') }}">Интернет магазин</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('index') }}">Все товары</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('categories') }}">Категории</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('basket') }}">Корзина</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="#">Сбросить проект в начальное состояние</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Админ панель</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#">Зарегистрироваться</a>
                </li>
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

