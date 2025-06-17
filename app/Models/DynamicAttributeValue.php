<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DynamicAttributeValue extends Model
{
    protected $fillable = ['dynamic_attribute_id', 'value_en', 'value_ar', 'entity_id', 'entity_type'];
    public function attribute()
    {
        return $this->belongsTo(DynamicAttribute::class, 'dynamic_attribute_id');
    }
    public function entity()
    {
        return $this->morphTo();
    }
}
