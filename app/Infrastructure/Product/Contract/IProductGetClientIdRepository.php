<?php

namespace App\Infrastructure\Product\Contract;

interface IProductGetClientIdRepository
{
    public function getClientId(int $id);
}
