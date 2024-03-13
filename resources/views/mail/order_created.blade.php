<p>Уважаемый {{ $name }}.</p>

<p>{{ __('mail/order_created.your_order') }}{{ $fullsum }} грн. создан.</p>

<table class="table">
    <thead>
    <tr>
        <th scope="col">Название</th>
        <th scope="col">Количество</th>
        <th scope="col">цена</th>
        <th scope="col">Стоимость</th>
    </tr>
    </thead>
    <tbody>
    @foreach($order->products as $product)
        <tr>
            <td><img class="card-img-top img-fluid m-auto" style="width: 3rem"
                     src="{{ \Illuminate\Support\Facades\Storage::url($product->image) }}" alt="dhd">
                <a href="{{ route('product', [$product->category->code, $product->code]) }}">{{ $product->name }}</a>
            </td>
            <td><span class="badge text-bg-secondary">{{ $product->pivot->quantity }}</span></td>
            <td>{{ $product->price }} грн</td>
            <td>{{ $product->getPriceCount() }} грн</td>
        </tr>
    @endforeach

    <tr>
        <td colspan="3">обшая стоимость</td>
        <td>{{ $order->calculateFullSum() }} грн</td>
    </tr>
    </tbody>
</table>

