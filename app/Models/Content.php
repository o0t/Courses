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

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($content) {
            $content->serial = static::generateUniqueSerial();
        });
    }

    protected static function generateUniqueSerial()
    {
        $maxSerial = static::max('serial') ?: 0;
        return $maxSerial + 1;
    }


}
