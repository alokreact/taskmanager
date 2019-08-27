<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
     protected $fillable = [
        'title', 'desc', 'salary','location'
     ];
}
