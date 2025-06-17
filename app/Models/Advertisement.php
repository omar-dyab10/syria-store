<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    protected $fillable = ['location_id', 'user_id', 'category_id', 'adable_id', 'adable_type', 'title', 'description', 'status', 'price', 'source',];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function advertisable()
    {
        return $this->morphTo();
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
