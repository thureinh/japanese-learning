<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Log;
use App\Events\MailVerified;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::updating(function ($user) {
            if($user->isDirty('email'))
            {
                $user->email_verified_at = null;
                $user->sendEmailVerificationNotification();
            }
        });
        static::updated(function ($user) {
            if($user->wasChanged('email_verified_at'))
            {
                event(new MailVerified($user));
            }
        });
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'profile_pic', 'firstname', 'lastname', 'email', 'password', 'phone', 'address',
        'batch_no', 'roll_no', 'dateofbirth'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'dateofbirth' => 'date',
        'email_verified_at' => 'datetime',
        'is_Teacher' => 'boolean'
    ];

    public function writings()
    {
        return $this->belongsToMany('App\Writing', 'user_writing', 'user_id', 
                    'writing_id')
                    ->as('userwriting')
                    ->withPivot('student_writing', 'check_writing', 'mark', 'status', 'submitted_datetime')
                    ->withTimestamps();
    }
}
