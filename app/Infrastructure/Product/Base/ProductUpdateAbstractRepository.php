<?php

namespace App\Infrastructure\Product\Base;

abstract class ProductUpdateAbstractRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = app($this->model);
    }

    public function update(int $id, array $body = [])
    {
        $model = $this->model->find($id);

        if ($model) {
            $model->update([
                'name' => $body['name'],
                'description' => $body['description'],
                'price' => $body['price'],
                'category_id' => $body['category_id'],
            ]);
        }

        return $this->model->find($id);
    }
}
