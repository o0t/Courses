<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;


    public function Section()
    {
        return $this->belongsTo(Section::class, 'section_id', 'id');
    }


    public function Videos()
    {
        return $this->hasMany(Videos::class, 'content_id', 'id');
    }


    public function Txt()
    {
        return $this->hasMany(Txt::class, 'content_id', 'id');
    }

    public function Pdf()
    {
        return $this->hasMany(Pdf::class, 'content_id', 'id');
    }

    public function test()
    {
        return $this->hasMany(test::class, 'content_id', 'id');
    }
}
