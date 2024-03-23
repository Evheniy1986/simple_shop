<?php

namespace App\Providers;

use App\Services\CurrencyConversion;
use App\ViewComposers\BestProductComposer;
use App\ViewComposers\CategoriesComposer;
use App\ViewComposers\CurrenciesComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer(['layouts.master', 'categories'], CategoriesComposer::class);
        View::composer('layouts.master', CurrenciesComposer::class);
        View::composer('layouts.master', BestProductComposer::class);

        View::composer('*', function ($view) {
            $currencySymbol = CurrencyConversion::getCurrencySymbol();
            $view->with('currencySymbol', $currencySymbol);
        });

    }
}
