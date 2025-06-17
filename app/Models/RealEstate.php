<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RealEstate extends Model
{
    use HasFactory;
    protected $fillable = ['realEstate_type', 'area', 'number', 'status', 'price'];
    public function advertisement()
    {
        return $this->morphOne(Advertisement::class, 'adable');
    }
    public function attributeValues()
    {
        return $this->morphMany(DynamicAttributeValue::class, 'entity');
    }
}
