<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;
    protected $guarded = [];




    public function User()
    {
        return $this->belongsTo(User::class);
    }



    public function content()
    {
        return $this->belongsTo(Content::class, 'content_id' , 'id');
    }

}
