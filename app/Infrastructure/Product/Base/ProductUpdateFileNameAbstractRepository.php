<?php

namespace App\Infrastructure\Product\Base;

abstract class ProductUpdateFileNameAbstractRepository
{
    protected $model;

    public function __construct()
    {
        $this->model = app($this->model);
    }

    public function updateFileName(int $id, string $originalName, string $storedFileName)
    {
        $model = $this->model->find($id);

        if ($model) {
            $model->update([
                'original_name' => $originalName,
                'stored_filename' => $storedFileName,
            ]);
        }
    }
}
