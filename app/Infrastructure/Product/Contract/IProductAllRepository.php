<?php

namespace App\Infrastructure\Product\Contract;

interface IProductAllRepository
{
    public function getAll(array $body);
}
