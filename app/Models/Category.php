<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['parent_id', 'name_en', 'name_ar', 'slug'];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
    public function advertisements()
    {
        return $this->hasMany(Advertisement::class);
    }
    public function dynamicAttributes()
    {
        return $this->hasMany(DynamicAttribute::class);
    }

}