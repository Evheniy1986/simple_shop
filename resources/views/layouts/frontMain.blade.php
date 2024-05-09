<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
                    <a class="nav-link active" href="#">Админ панель</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#">Зарегистрироваться</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link basket" href="#"><i class="fas fa-cart-arrow-down"></i></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
@yield('content')

<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('adminlte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/35689621a5.js" crossorigin="anonymous"></script>
</body>
</html>
