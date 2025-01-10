<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/css/select2.min.css') }}">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.min.css">

{{--    @vite([  'resources/js/app.js'])--}}
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <title>Title</title>
</head>
<body>
<nav class="bg-dark  navbar navbar-dark navbar-expand-lg">
    <div class="container">
        <div class="collapse navbar-collapse d-flex justify-content-around ">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('main.index') }}">Интернет магазин</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('categories.index') }}">Категории</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('admin.index') }}">Админ панель</a>
                </li>
                @if (Route::has('login'))
{{--                    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">--}}
                        @auth
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ url('/dashboard') }}">Личный кабинет</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('login') }}">Войти</a>
                            </li>

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link active" href="{{ route('register') }}">Регистрация</a>
                                </li>
                            @endif
                        @endauth
{{--                    </div>--}}
                @endif
                <li class="nav-item ">
                    <a class="nav-link basket" href="{{ route('basket.show') }}"><span class="badge text-bg-secondary cart-badge">{{ \App\Http\Controllers\Front\CartController::getCount(session()->get('cart')) }}<i class="fas fa-cart-arrow-down"></i></span></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div id="warningMessage">
    @if(session()->has('warning'))
        <div class="warning alert alert-danger text-center text-bold">
            {{ session('warning') }}
        </div>
        <div class="alert alert-success text-center">
            {{ session('warning') }}
        </div>
    @endif
</div>
@yield('content')

<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('adminlte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/35689621a5.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.11.0/dist/sweetalert2.all.min.js"></script>
<script src="{{ asset('adminlte/plugins/select2/js/select2.full.min.js') }}"></script>
<script type="text/javascript">
    $('select').select2();
</script>
</body>
<footer>
    <nav class="navbar navbar-expand-lg bg-dark mt-5" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</footer>
</html>
