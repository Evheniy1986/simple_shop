
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


    <title>Title</title>
</head>
<body>
<nav class="bg-dark  navbar navbar-dark navbar-expand-lg">
    <div class="container">
        <div class="collapse navbar-collapse d-flex justify-content-around ">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Интернет магазин</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="#">Все товары</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="#">Катеегории</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="#">Корзина</a>
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
    <div class="container">
        <h2 class="text-center mb-5">Все категории</h2>
        @foreach($categories as $category)
            <div class=" mx-auto">
                <div class="card border-0">
                    <img class="card-img-top img-fluid m-auto" style="width: 3rem" src="{{asset('storage/images/xiaomi.png')}}" alt="dhd">
                    <div class="card-body">
                        <a href="{{ route('category', $category->code) }}"><h5 class="text-center border-0">{{ $category->name }}</h5></a>
                        <p class="card-text text-center">{{ $category->description }}</p>
                        <hr>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</main>
</body>
</html>
