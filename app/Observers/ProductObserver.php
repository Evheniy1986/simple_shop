<?php

namespace App\Observers;

use App\Models\Product;
use App\Models\Sku;
use App\Models\Subscribtion;

class ProductObserver
{
    public function updating(Sku $sku)
    {
        $oldCount = $sku->getOriginal('count');

        if ($oldCount == 0 && $sku->count > 0) {
            Subscribtion::sendEmailBySubscription($sku);

        }
    }
}
