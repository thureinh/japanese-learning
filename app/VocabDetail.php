<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VocabDetail extends Model
{
    //
    public function vocab()
    {
        return $this->belongsTo('App\Vocab');
    }
}
