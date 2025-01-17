<?php

namespace App\Providers;

use App\Repositories\Contracts\SearchEngine;
use App\Repositories\Implementations\MeilisearchEngine;
use App\Traits\FetchesUrls;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Lunar\Admin\Support\Facades\LunarPanel;
use Lunar\Models\Product;

class AppServiceProvider extends ServiceProvider
{
    use FetchesUrls;

    /**
     * Register any application services.
     */
    public function register(): void
    {
        LunarPanel::register();
        $this->app->bind(SearchEngine::class, MeilisearchEngine::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        Route::bind('product', function (string $value) {
            $url = $this->fetchUrl(
                $value,
                (new Product())->getMorphClass(),
                [
                    'element.media',
                    'element.variants.basePrices.currency',
                    'element.variants.basePrices.priceable',
                    'element.variants.values.option',
                ]
            );
            if (!$url->element) {
                abort(404);
            }

            return $url->element;
        });
    }
}
