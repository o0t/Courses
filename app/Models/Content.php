<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function courses()
    {
        return $this->belongsToMany(Courses::class, 'courses_contents');
    }

    public function Comments(){
        return $this->hasMany(Comments::class,'content_id','id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($content) {
            $content->serial = static::generateUniqueSerial($content->courses_id);
        });
    }

    protected static function generateUniqueSerial($courseId)
    {
        $maxSerial = static::where('courses_id', $courseId)->max('serial') ?: 0;
        return $maxSerial + 1;
    }


}
