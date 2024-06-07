<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Videos extends Model
{
    use HasFactory;


    public function Content()
    {
        return $this->belongsTo(Content::class, 'id', 'content_id');
    }

}
