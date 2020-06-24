<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KanjiWord extends Model
{
    //
    public function kanji() {
    	return $this->belongsTo('App\Kanji');
    }
}
