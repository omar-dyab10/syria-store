<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DynamicAttributeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'category_name_en' => $this->category->name_en,
            'category_name_ar' => $this->category->name_ar,
            'name_en' => $this->name_en,
            'name_ar' => $this->name_ar,
        ];
    }
}
