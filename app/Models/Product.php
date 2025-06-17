<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['product_type', 'name_en', 'name_ar', 'brand', 'year', 'status', 'warranty', 'warranty_duration', 'price', 'description'];
    public function advertisement()
    {
        return $this->morphOne(Advertisement::class, 'adable');
    }
    public function attributeValues()
    {
        return $this->morphMany(DynamicAttributeValue::class, 'entity');
    }
}
