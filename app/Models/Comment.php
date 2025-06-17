<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['parent_id', 'user_id', 'advertisement_id', 'content'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function advertisement()
    {
        return $this->belongsTo(Advertisement::class);
    }
    public function parent()
    {
        return $this->belongsTo(Comment::class, 'parent_id');
    }
}
