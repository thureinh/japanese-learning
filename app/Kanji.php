<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kanji extends Model
{
    //

    public function kanjiwords()
    {
        return $this->hasMany('App\KanjiWord');
    }
}
