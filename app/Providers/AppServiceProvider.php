<?php

namespace App\Providers;

use App\Infrastructure\Product\Base\ProductGetByIdAbstractRepository;
use App\Infrastructure\Product\Contract\IProductAllRepository;
use App\Infrastructure\Product\Contract\IProductCreateRepository;
use App\Infrastructure\Product\Contract\IProductDeleteRepository;
use App\Infrastructure\Product\Contract\IProductGetByIdRepository;
use App\Infrastructure\Product\Contract\IProductUpdateRepository;
use App\Infrastructure\Product\Eloquent\ProductAllRepository;
use App\Infrastructure\Product\Eloquent\ProductCreateRepository;
use App\Infrastructure\Product\Eloquent\ProductDeleteRepository;
use App\Infrastructure\Product\Eloquent\ProductUpdateRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(IProductAllRepository::class, ProductAllRepository::class);
        $this->app->singleton(IProductGetByIdRepository::class, ProductGetByIdAbstractRepository::class);
        $this->app->singleton(IProductCreateRepository::class, ProductCreateRepository::class);
        $this->app->singleton(IProductUpdateRepository::class, ProductUpdateRepository::class);
        $this->app->singleton(IProductDeleteRepository::class, ProductDeleteRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
