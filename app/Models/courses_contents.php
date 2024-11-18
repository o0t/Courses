<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class courses_contents extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $table = 'courses_contents';

    public function courses()
    {
        return $this->belongsTo(Courses::class);
    }

    public function content()
    {
        return $this->belongsTo(Content::class);
    }

}
