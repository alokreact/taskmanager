<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jobs extends Model
{
    
     protected $fillable = [
        'name', 'email', 'desc',
    ];
}
