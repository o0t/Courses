<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    use HasFactory;
    protected $guarded = [];



    public function User()
    {
        return $this->belongsTo(User::class);
    }


    public function courses()
    {
        return $this->hasMany(Courses::class); // Adjust the relationship type and model name as needed
    }
}
