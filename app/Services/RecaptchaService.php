<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;

class RecaptchaService
{

    protected $secretKey;

    public function __construct()
    {
        $this->secretKey =  config('services.recaptcha.secret');

    }

    public function validate(string $recaptchaResponse) : void {

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => $this->secretKey,
            'response' => $recaptchaResponse,
        ]);

        $responseBody = $response->json();

        if (!$responseBody['success'] || $responseBody['score'] < 0.5) {
            throw ValidationException::withMessages([
                'g-recaptcha-response' => 'ReCAPTCHA validation failed. Please try again.'
            ]);
        }

    }

}
