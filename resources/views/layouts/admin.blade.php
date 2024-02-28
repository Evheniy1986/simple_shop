<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
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
<nav class="bg-light  navbar navbar-light navbar-expand-lg">
    <div class="container">
        <div class="collapse navbar-collapse d-flex justify-content-around ">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('index') }}">Вернуться на сайт</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('categories.index') }}">Категории</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="#">Товары</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="#">Заказы</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                @guest()
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('login') }}">Войти</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('register') }}">Зарегистрироваться</a>
                    </li>
                @endguest
                @auth()
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('get-logout') }}">Выйти</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
<main class="mt-5">
    @yield('content')
</main>
</body>
</html>

