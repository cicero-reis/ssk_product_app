<?php

namespace App\Application\Dtos;

use App\Http\Requests\Product\ProductStoreRequest;

class ProductCreateDto
{
    public string $name;
    public float $price;
    public string $description;
    public string $client_id;
    public int $category_id;

    public function __construct(string $name, float $price, string $description, string $client_id, int $category_id)
    {
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->client_id = $client_id;
        $this->category_id = $category_id;
    }

    public static function fromArray(ProductStoreRequest $request): self
    {
        return new self(
            $request->input('name'),
            $request->input('price'),
            $request->input('description'),
            $request->input('client_id'),
            $request->input('category_id')
        );
    }

    public function toArray()
    {
        return get_object_vars($this);
    }
}
