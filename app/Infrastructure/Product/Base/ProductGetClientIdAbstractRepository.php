<?php

namespace App\Infrastructure\Product\Base;

abstract class ProductGetClientIdAbstractRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = app($this->model);
    }

    public function getClientId(int $clientId)
    {
        return $this->model->where('client_id', $clientId)->get();
    }
}
