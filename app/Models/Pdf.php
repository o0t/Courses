<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pdf extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Content()
    {
        return $this->belongsTo(Content::class, 'id', 'content_id');
    }
}
