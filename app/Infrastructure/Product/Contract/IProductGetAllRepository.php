<?php

namespace App\Infrastructure\Product\Contract;

interface IProductGetAllRepository
{
    public function getAll(array $body);
}
