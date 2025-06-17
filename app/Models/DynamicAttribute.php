<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DynamicAttribute extends Model
{
    protected $fillable = ['category_id', 'name_en', 'name_ar', 'type'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function values()
    {
        return $this->hasMany(DynamicAttributeValue::class,'dynamic_attribute_id');
    }

}
