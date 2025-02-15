<?php

namespace App\Infrastructure\Product\Eloquent;

use App\Infrastructure\Product\Base\ProductGetByIdAbstractRepository;
use App\Infrastructure\Product\Contract\IProductGetByIdRepository;
use App\Models\Product;

class ProductGetByIdRepository extends ProductGetByIdAbstractRepository implements IProductGetByIdRepository
{
    protected $model = Product::class;
}
