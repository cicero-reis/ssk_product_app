<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'client_id' => $this->client_id,
            'category_id' => $this->category_id,
            'original_name' => $this->original_name,
            'stored_filename' => $this->stored_filename,
            'created_at' => $this->created_at,
        ];
    }
}
