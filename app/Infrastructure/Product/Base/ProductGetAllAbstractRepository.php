<?php

namespace App\Infrastructure\Product\Base;

abstract class ProductGetAllAbstractRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = app($this->model);
    }

    public function getAll(array $body = [])
    {
        return $this->model->all();
    }
}
