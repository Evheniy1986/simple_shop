
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
        <h2 class="text-center mb-3">Apple iPhone 15 256GB Black (MTP63)</h2>
        <p class="text-center mb-3">Цена: <strong>41 999 грн</strong></p>
        <div class=" mx-auto">
            <div class="card border-0">
                <img class=" img-fluid m-auto" src="{{asset('storage/images/iphone_15.png')}}" alt="dhd">
                <div class="card-body">
                    <p class="card-text text-center">Классный телефон я б себе такой купил</p>
                </div>
                <div class="mb-5 mx-auto">
                    <button class="btn btn-success" type="submit">Добавить в корзину</button>
                </div>
            </div>
        </div>

    </div>
</main>
</body>
</html>
