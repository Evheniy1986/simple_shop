<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\Sku;
use App\Observers\ProductObserver;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::directive('routeactive', function ($route) {
            return "<?php echo Route::currentRouteNamed($route) ? 'class=\"nav-link active\"' : 'class=\"nav-link\"'?>";
        });

        Sku::observe(ProductObserver::class);

        Paginator::useBootstrapFive();
    }
}
