<?php

namespace App\Providers;

use App\Services\CartService;
use App\View\Composers\CategoryComposer;
use App\View\Composers\SliderComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(CartService::class, function () {
            return new CartService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer(['front.index', 'front.category'], CategoryComposer::class);
        View::composer(['front.index', 'front.category'], SliderComposer::class);
    }
}
