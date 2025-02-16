<?php

namespace App\Infrastructure\Product\Repository;

use App\Infrastructure\Product\Base\ProductGetByIdAbstractRepository;
use App\Infrastructure\Product\Contract\IProductGetByIdRepository;
use App\Models\Product;

class ProductGetByIdRepository extends ProductGetByIdAbstractRepository implements IProductGetByIdRepository
{
    protected $model = Product::class;
}
