 Уважаемый клиент товар {{ $sku->product->name }} появился в наличии.

 <a href="{{ route('product', [$sku->product->category->code, $sku->product->code, $sku]) }}">Узнать подробности</a>
