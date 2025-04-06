<?php

namespace App\Providers;

use App\Application\UseCase\Contract\IProductCreateUseCase;
use App\Application\UseCase\Contract\IProductDeleteUseCase;
use App\Application\UseCase\Contract\IProductGetAllUseCase;
use App\Application\UseCase\Contract\IProductGetByIdUseCase;
use App\Application\UseCase\Contract\IProductGetCategoryIdUseCase;
use App\Application\UseCase\Contract\IProductGetClientIdUseCase;
use App\Application\UseCase\Contract\IProductUpdateFileNameUseCase;
use App\Application\UseCase\Contract\IProductUpdateUseCase;
use App\Application\UseCase\Contract\IProductUploadFileServiceUseCase;
use App\Application\UseCase\ProductCreateUseCase;
use App\Application\UseCase\ProductDeleteUseCase;
use App\Application\UseCase\ProductGetAllUseCase;
use App\Application\UseCase\ProductGetByIdUseCase;
use App\Application\UseCase\ProductGetCategoryIdUseCase;
use App\Application\UseCase\ProductGetClientIdUseCase;
use App\Application\UseCase\ProductUpdateFileNameUseCase;
use App\Application\UseCase\ProductUpdateUseCase;
use App\Application\UseCase\ProductUploadFileServiceUseCase;
use App\Infrastructure\Product\Contract\IProductCreateRepository;
use App\Infrastructure\Product\Contract\IProductDeleteRepository;
use App\Infrastructure\Product\Contract\IProductGetAllRepository;
use App\Infrastructure\Product\Contract\IProductGetByIdRepository;
use App\Infrastructure\Product\Contract\IProductGetCategoryIdRepository;
use App\Infrastructure\Product\Contract\IProductGetClientIdRepository;
use App\Infrastructure\Product\Contract\IProductUpdateFileNameRepository;
use App\Infrastructure\Product\Contract\IProductUpdateRepository;
use App\Infrastructure\Product\Contract\IProductUploadFileService;
use App\Infrastructure\Product\Repository\ProductCreateRepository;
use App\Infrastructure\Product\Repository\ProductDeleteRepository;
use App\Infrastructure\Product\Repository\ProductGetAllRepository;
use App\Infrastructure\Product\Repository\ProductGetByIdRepository;
use App\Infrastructure\Product\Repository\ProductGetCategoryIdRepository;
use App\Infrastructure\Product\Repository\ProductGetClientIdRepository;
use App\Infrastructure\Product\Repository\ProductUpdateFileNameRepository;
use App\Infrastructure\Product\Repository\ProductUpdateRepository;
use App\Infrastructure\Product\Service\ProductUploadFileService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(IProductGetAllRepository::class, ProductGetAllRepository::class);
        $this->app->singleton(IProductGetByIdRepository::class, ProductGetByIdRepository::class);
        $this->app->singleton(IProductCreateRepository::class, ProductCreateRepository::class);
        $this->app->singleton(IProductUpdateRepository::class, ProductUpdateRepository::class);
        $this->app->singleton(IProductDeleteRepository::class, ProductDeleteRepository::class);
        $this->app->singleton(IProductGetClientIdRepository::class, ProductGetClientIdRepository::class);
        $this->app->singleton(IProductUploadFileService::class, ProductUploadFileService::class);
        $this->app->singleton(IProductUpdateFileNameRepository::class, ProductUpdateFileNameRepository::class);
        $this->app->singleton(IProductGetCategoryIdRepository::class, ProductGetCategoryIdRepository::class);

        $this->app->singleton(IProductGetAllUseCase::class, ProductGetAllUseCase::class);
        $this->app->singleton(IProductGetByIdUseCase::class, ProductGetByIdUseCase::class);
        $this->app->singleton(IProductCreateUseCase::class, ProductCreateUseCase::class);
        $this->app->singleton(IProductUpdateUseCase::class, ProductUpdateUseCase::class);
        $this->app->singleton(IProductDeleteUseCase::class, ProductDeleteUseCase::class);
        $this->app->singleton(IProductGetClientIdUseCase::class, ProductGetClientIdUseCase::class);
        $this->app->singleton(IProductUpdateFileNameUseCase::class, ProductUpdateFileNameUseCase::class);
        $this->app->singleton(IProductUploadFileServiceUseCase::class, ProductUploadFileServiceUseCase::class);
        $this->app->singleton(IProductGetCategoryIdUseCase::class, ProductGetCategoryIdUseCase::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
