<?php

namespace App\Services;

use App\Models\Currency;
use Illuminate\Support\Facades\Http;

class CurrencyRates
{
    public static function getRates()
    {
//        $code = CurrencyConversion::getBaseCurrency();

        $url = "https://bank.gov.ua/NBUStatService/v1/statdirectory/exchangenew?json";
        $response = Http::withOptions(['verify' => false])->get($url);
        if ($response->status() != 200) {
            throw new \Exception('There is a problem with currency rate service');
        }
        $responseArr = $response->json();

        foreach (CurrencyConversion::getCurrencies() as $currency) {
            foreach ($responseArr as $response) {

                if (!$currency->is_main) {
                    if ($response['cc'] == $currency->code) {
                        $currency->update(['rate' => $response['rate']]);
//                        $currency->touch();
                    }

                }
            }
        }
        dump(1);
    }
}
