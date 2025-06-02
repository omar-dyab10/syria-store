<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = ['parent_id', 'location_type','name_en','name_ar','is_active'];

    public function parent()
    {
        return $this->belongsTo(Location::class, 'parent_id');
    }

    public function children(){
        return $this->hasMany(Location::class, 'parent_id');
    }
    public function advertisements() {
        return $this->hasMany(Advertisement::class);
    }
}
