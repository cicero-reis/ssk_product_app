<?php

namespace App\Infrastructure\Product\Base;

abstract class ProductCreateAbstractRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = app($this->model);
    }

    public function create(array $body = [])
    {
        return $this->model->create([
            'name' => $body['name'],
            'description' => $body['description'],
            'price' => $body['price'],
            'category_id' => $body['category_id'],
        ]);
    }
}
