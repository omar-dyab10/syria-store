<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdvertisementResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "location" => [
                "name_en" => $this->location->name_en,
                "name_ar" => $this->location->name_ar
            ],
            "user" => $this->user->name,
            "title" => $this->title,
            "category" => [
                "name_en" => $this->category->name_en,
                "name_ar" => $this->category->name_ar
            ],
            "price" => $this->price,
            "description" => $this->description,
            "status" => $this->status,
            "source" => $this->source,
        ];
    }
}
