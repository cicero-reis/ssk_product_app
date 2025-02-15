<?php

namespace App\Infrastructure\Product\Contract;

interface IProductGetByIdRepository
{
    public function getById(int $id);
}
