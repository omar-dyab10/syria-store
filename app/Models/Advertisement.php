<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Advertisement extends Model implements HasMedia
{
    use InteractsWithMedia;
    protected $fillable = ['location_id', 'user_id', 'category_id', 'adable_id', 'adable_type', 'title', 'description', 'status', 'price', 'source',];
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('images')
            ->useDisk('public');

        $this->addMediaCollection('main_image')
            ->singleFile()
            ->useDisk('public');
    }
    public function registerMediaConversions(Media $media = null): void
    {        $this->addMediaConversion('thumb')
            ->width(200)
            ->height(200)
            ->sharpen(10)
            ->nonQueued();

        $this->addMediaConversion('medium')
            ->width(300)
            ->height(200)
            ->sharpen(10)
            ->nonQueued();
    }
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
    public function adable()
    {
        return $this->morphTo('adable');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
