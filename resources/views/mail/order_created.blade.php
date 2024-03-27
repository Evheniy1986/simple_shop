<p>Уважаемый {{ $name }}.</p>

<p>{{ __('mail/order_created.your_order') }}{{ $fullsum }} {{ $currencySymbol }}. создан.</p>

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
    @foreach($order->skus as $sku)
        <tr>
            <td><img class="card-img-top img-fluid m-auto" style="width: 3rem"
                     src="{{ \Illuminate\Support\Facades\Storage::url($sku->product->image) }}" alt="dhd">
                <a href="{{ route('product', [$sku->product->category->code, $sku->product->code, $sku]) }}">{{ $sku->product->__('name') }}</a>
            </td>
            <td><span class="badge text-bg-secondary">{{ $sku->count }}</span></td>
            <td>{{ $sku->price }} {{ $currencySymbol }}</td>
            <td>{{ $sku->price * $sku->count }} {{ $currencySymbol }}</td>
        </tr>
    @endforeach

    <tr>
        <td colspan="3">обшая стоимость</td>
        <td>{{ $order->calculateFullSum() }} {{ $currencySymbol }}</td>
    </tr>
    </tbody>
</table>

