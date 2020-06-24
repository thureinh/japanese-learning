<?php

namespace App\Listeners;

use App\Events\MailVerified;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RedirectPage
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  MailVerified  $event
     * @return void
     */
    public function handle(MailVerified $event)
    {
        // if($event->user->hasVerifiedEmail())
        // {
        //     if($event->user->is_Teacher)
        //         Route::view('/senseihome', 'senseihome');
        //     else
        //         Route::view('/studenthome', 'studenthome');
        // }
    }
}
