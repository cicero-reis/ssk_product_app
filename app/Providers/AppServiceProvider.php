<?php

namespace App\Providers;

use App\Application\UseCase\Contract\IProductCreateUseCase;
use App\Application\UseCase\Contract\IProductDeleteUseCase;
use App\Application\UseCase\Contract\IProductGetAllUseCase;
use App\Application\UseCase\Contract\IProductGetByIdUseCase;
use App\Application\UseCase\Contract\IProductUpdateUseCase;
use App\Application\UseCase\ProductCreateUseCase;
use App\Application\UseCase\ProductDeleteUseCase;
use App\Application\UseCase\ProductGetAllUseCase;
use App\Application\UseCase\ProductGetByIdUseCase;
use App\Application\UseCase\ProductUpdateUseCase;
use App\Infrastructure\Product\Base\ProductGetByIdAbstractRepository;
use App\Infrastructure\Product\Contract\IProductCreateRepository;
use App\Infrastructure\Product\Contract\IProductDeleteRepository;
use App\Infrastructure\Product\Contract\IProductGetAllRepository;
use App\Infrastructure\Product\Contract\IProductGetByIdRepository;
use App\Infrastructure\Product\Contract\IProductUpdateRepository;
use App\Infrastructure\Product\Repository\ProductCreateRepository;
use App\Infrastructure\Product\Repository\ProductDeleteRepository;
use App\Infrastructure\Product\Repository\ProductGetAllRepository;
use App\Infrastructure\Product\Repository\ProductUpdateRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(IProductGetAllRepository::class, ProductGetAllRepository::class);
        $this->app->singleton(IProductGetByIdRepository::class, ProductGetByIdAbstractRepository::class);
        $this->app->singleton(IProductCreateRepository::class, ProductCreateRepository::class);
        $this->app->singleton(IProductUpdateRepository::class, ProductUpdateRepository::class);
        $this->app->singleton(IProductDeleteRepository::class, ProductDeleteRepository::class);

        $this->app->singleton(IProductGetAllUseCase::class, ProductGetAllUseCase::class);
        $this->app->singleton(IProductGetByIdUseCase::class, ProductGetByIdUseCase::class);
        $this->app->singleton(IProductCreateUseCase::class, ProductCreateUseCase::class);
        $this->app->singleton(IProductUpdateUseCase::class, ProductUpdateUseCase::class);
        $this->app->singleton(IProductDeleteUseCase::class, ProductDeleteUseCase::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
