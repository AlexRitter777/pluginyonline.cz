<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;

class RecaptchaService
{

    public static function validate(string $token)  {

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => config('services.recaptcha.secret'),
            'response' => $token,
        ]);

        $responseBody = $response->json();


        if (!$responseBody['success'] || $responseBody['score'] < 0.5) {
            return false;
        }

        return true;

    }

}
