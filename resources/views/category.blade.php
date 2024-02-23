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
        <h2 class="text-center mb-3">{{ $category->name }}</h2>
        <p class="text-center">{{ $category->description }}</p>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <div class="col" style="width: 20rem">
                <div class="card shadow-sm">
                    <img class="card-img-top img-fluid" src="{{ asset('storage/images/xiaomi_13.png') }}" alt="dhd">
                    <div class="card-body">
                        <h5 class="text-center">Xiaomi Redmi Note 13 8/256 Mint Green</h5>
                        <p class="card-text text-center">Цена: 9299 грн</p>

                        <div class="d-flex justify-content-center">
                            <div class="me-2">
                                <button type="button" class="btn btn-primary">В корзину</button>
                            </div>
                            <div>
                                <button type="button" class="btn btn-outline-secondary">Подробнее</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col" style="width: 20rem">
                <div class="card shadow-sm">
                    <img class="card-img-top img-fluid" src="{{ asset('storage/images/iphone_15.png') }}" alt="dhd">
                    <div class="card-body">
                        <h5 class="text-center">Apple iPhone 15 256GB Black (MTP63)</h5>
                        <p class="card-text text-center">Цена: 41 999 грн</p>

                        <div class="d-flex justify-content-center">
                            <div class="me-2">
                                <button type="button" class="btn btn-primary">В корзину</button>
                            </div>
                            <div>
                                <button type="button" class="btn btn-outline-secondary">Подробнее</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col" style="width: 20rem">
                <div class="card shadow-sm">
                    <img class="card-img-top img-fluid" src="{{ asset('storage/images/poco_x6.png') }}" alt="dhd">
                    <div class="card-body">
                        <h5 class="text-center">POCO X6 Pro 5G 12/512GB Black</h5>
                        <p class="card-text text-center">Цена: 15 999 грн</p>

                        <div class="d-flex justify-content-center">
                            <div class="me-2">
                                <button type="button" class="btn btn-primary">В корзину</button>
                            </div>
                            <div>
                                <button type="button" class="btn btn-outline-secondary">Подробнее</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>
</body>
</html>
