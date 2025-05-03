<?php

namespace App\Services;

use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SimpleMailer
{

    public function send(string $to, Mailable $mail){
        try {
            Mail::to($to)->send($mail);
        }catch (\Throwable $e){
            Log::error("Mail send failed to $to: " . $e->getMessage());
        }

    }

}
