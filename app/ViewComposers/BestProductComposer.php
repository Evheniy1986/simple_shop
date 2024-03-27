<?php

namespace App\ViewComposers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Sku;
use Illuminate\View\View;

class BestProductComposer
{
    public function compose(View $view)
    {


        $bestProductsId = Order::query()->get()->map->skus->flatten()->map->pivot->mapToGroups(function ($pivot) {
            return [$pivot->sku_id => $pivot->quantity];
        })->map->sum()->sortDesc()->take(3)->keys()->toArray();

        $bestProducts = Sku::query()->whereIn('id', $bestProductsId)->get();

        $view->with('bestProducts', $bestProducts);
    }
}

