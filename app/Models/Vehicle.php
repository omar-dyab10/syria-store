<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = ['vehicle_type', 'brand', 'model', 'series', 'version', 'year', 'mileage', 'engine_size', 'engine_power', 'color', 'price'];

    public function advertisement()
    {
        return $this->morphOne(Advertisement::class, 'adable');
    }
    public function attributeValues()
    {
        return $this->morphMany(DynamicAttributeValue::class, 'entity');
    }
}
