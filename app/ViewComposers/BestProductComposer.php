<?php

namespace App\ViewComposers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\View\View;

class BestProductComposer
{
    public function compose(View $view)
    {


        $bestProductsId = Order::query()->get()->map->products->flatten()->map->pivot->mapToGroups(function ($pivot) {
            return [$pivot->product_id => $pivot->quantity];
        })->map->sum()->sortDesc()->take(3)->keys()->toArray();

        $bestProducts = Product::query()->whereIn('id', $bestProductsId)->get();

        $view->with('bestProducts', $bestProducts);
    }
}

