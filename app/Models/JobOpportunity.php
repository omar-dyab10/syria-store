<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobOpportunity extends Model
{
    use HasFactory;
    protected $fillable = ['job_title', 'job_type', 'experience_level', 'salary', 'required_skills', 'company', 'deadline', 'description'];
    public function advertisement()
    {
        return $this->morphOne(Advertisement::class, 'adable');
    }
    public function attributeValues()
    {
        return $this->morphMany(DynamicAttributeValue::class, 'entity');
    }
}
