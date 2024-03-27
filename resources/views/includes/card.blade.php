<div class="col-auto" style="width: 20rem">
    <div style="height: 100%" class="card shadow-sm thumbnail">
        @if($sku->product->new === 1)
            <div class="">
                <span class="badge text-bg-success">Новинка</span>
            </div>
        @endif
        @if($sku->product->recommend === 1)
            <div class="">
                <span class="badge text-bg-warning">Рекомендуемые</span>
            </div>
        @endif
        @if($sku->product->hit === 1)
            <div class="">
                <span class="badge text-bg-danger">Хит продаж</span>
            </div>
        @endif
        <img  class="card-img-top img-fluid" src="{{\Illuminate\Support\Facades\Storage::url($sku->product->image)}}"
             alt="dhd">
        <div style="height: 100%" class="card-body">
            <h5 class="text-center">{{mb_substr($sku->product->name ,0, 30). ' ...' }}</h5>
            @isset($sku->product->properties)
                @foreach($sku->propertyOptions as $propertyOption)
                <h5 class="text-center">{{ $propertyOption->property->__('name') }} : {{ $propertyOption->__('name') }}</h5>
                @endforeach
            @endisset
            <p class="card-text text-center">Цена: {{ $sku->price }} {{ $currencySymbol }}</p>
            <p class="text-center">{{isset($category) ? $category->__('name') : $sku->product->category->__('name') }}</p>
            <div class="d-flex justify-content-center ">
                <div class="me-2">
                    <form action="{{ route('basket-add', $sku) }}" method="post">
                        @csrf
                        @if($sku->isAvailable())
                        <button type="submit" class="btn btn-primary">В корзину</button>
                        @else
                             <p class="text-danger">Товар не доступен</p>
                        @endif
                    </form>
                </div>

                <div>
                    <a class="btn btn-outline-secondary"
                       href="{{ route('product', [isset($category) ? $category->code : $sku->product->category->code, $sku->product->code, $sku->id]) }}">Подробнее</a>
                </div>
            </div>
        </div>
    </div>
</div>
