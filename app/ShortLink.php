<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShortLink extends Model
{
    protected $fillable = [
        'code', 'user_id' , 'link', 'total'
    ];
}
