<?php

namespace App\Services;

use App\Models\Currency;

class CurrencyConversion
{

    protected static $container;

    public static function loadContainer()
    {
        if (is_null(self::$container)) {
            $currencies =  Currency::get();
            foreach ($currencies as $currency) {
                self::$container[$currency->code] = $currency;
            }
        }
    }

    public static function getCurrencies()
    {
        return self::$container;
    }

    public static function convert($sum, $originCurrencyCode = 'UAH', $targetCurrencyCode = null)
    {

        self::loadContainer();

        $originCurrency = self::$container[$originCurrencyCode];

        if (is_null($targetCurrencyCode)) {
            $targetCurrencyCode = session('currency', 'UAH');
        }
        $targetCurrency = self::$container[$targetCurrencyCode];
//        session()->forget('full_order_sum');
        return round($sum * $originCurrency->rate / $targetCurrency->rate, 1);
    }

    public static function getCurrencySymbol()
    {
        self::loadContainer();

        $currencyFromSession = session('currency', 'UAH');

        $currency = self::$container[$currencyFromSession];
        return $currency->symbol;
    }
}
