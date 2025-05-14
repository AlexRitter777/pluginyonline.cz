<?php

namespace App\Listeners;


use App\Notifications\PasswordHasBeenResetNotification;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Log;

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

        try {
            $user->notify(new PasswordHasBeenResetNotification());
        }catch (\Throwable $e){
            Log::error("Password changed email notification has been failed: " . $e->getMessage());

        }


    }


}
