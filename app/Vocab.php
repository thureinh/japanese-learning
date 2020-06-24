<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vocab extends Model
{
    //

    public function vocabdetails()
    {
        return $this->hasMany('App\VocabDetail');
    }
}
