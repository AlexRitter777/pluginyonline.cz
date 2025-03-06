<?php

namespace App\Listeners;


use App\Notifications\PasswordHasBeenResetNotification;
use Illuminate\Auth\Events\PasswordReset;

class SendPasswordChangedNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PasswordReset $event): void
    {

        $user = $event->user;


        $user->notify(new PasswordHasBeenResetNotification());


    }


}
