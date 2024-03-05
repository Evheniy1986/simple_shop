<div class="col-auto" style="width: 20rem">
    <div style="height: 100%" class="card shadow-sm thumbnail">
        @if($product->new === 1)
            <div class="">
                <span class="badge text-bg-success">Новинка</span>
            </div>
        @endif
        @if($product->recommend === 1)
            <div class="">
                <span class="badge text-bg-warning">Рекомендуемые</span>
            </div>
        @endif
        @if($product->hit === 1)
            <div class="">
                <span class="badge text-bg-danger">Хит продаж</span>
            </div>
        @endif
        <img  class="card-img-top img-fluid" src="{{\Illuminate\Support\Facades\Storage::url($product->image)}}"
             alt="dhd">
        <div style="height: 100%" class="card-body">
            <h5 class="text-center">{{mb_substr($product->name.'..' ,0, 30) }}</h5>
            <p class="card-text text-center">Цена: {{ $product->price }}грн</p>
            <p class="text-center">{{ $product->category->name }}</p>
            <div class="d-flex justify-content-center ">
                <div class="me-2">
                    <form action="{{ route('basket-add', $product) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-primary">В корзину</button>
                    </form>
                </div>

                <div>
                    <a class="btn btn-outline-secondary"
                       href="{{ route('product', [isset($category) ? $category->code : $product->category->code, $product->code]) }}">Подробнее</a>
                </div>
            </div>
        </div>
    </div>
</div>
