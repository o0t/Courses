<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class section_content extends Model
{
    use HasFactory;

    public function Section()
    {
        return $this->belongsTo(Section::class, 'section_id', 'id');
    }

    public function Content()
    {
        return $this->belongsTo(Content::class, 'content_id', 'id');
    }

}
