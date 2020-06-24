<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grammar extends Model
{
     /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
       'explanation' => 'array'
    ];
}
