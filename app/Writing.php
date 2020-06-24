<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Writing extends Model
{
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
       	'deadline' => 'date'
    ];

    public function users()
    {
        return $this->belongsToMany('App\User')
        			->as('userwriting')
                    ->withPivot('student_writing', 'check_writing', 'mark', 'status', 'submitted_datetime')
                    ->withTimestamps();
    }    
}
