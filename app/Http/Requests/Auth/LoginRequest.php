<?php

namespace App\Http\Requests\Auth;

use App\Services\RecaptchaService;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    protected $recaptcha;

    public function __construct(RecaptchaService $recaptcha)
    {

        parent::__construct();
        $this->recaptcha = $recaptcha;

    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'exists:users', 'string', 'email', 'max:60'],
            'password' => ['required', 'string', 'max:60'],
//            'g-recaptcha-response' => ['required', 'string']
        ];
    }


    /**
     * Perform post-validation actions.
     *
     * This method is automatically called after successful validation.
     * It validates the reCAPTCHA response by calling the RecaptchaService.
     *
     * @return void
     * @throws ValidationException If reCAPTCHA validation fails.
     */
    /*protected function passedValidation()
    {

        $this->recaptcha->validate($this->input('g-recaptcha-response'));
    }*/

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws ValidationException
     */
    public function authenticate(): void
    {
        $this->ensureIsNotRateLimited();

        if (! Auth::attempt($this->only('email', 'password'), $this->boolean('remember'))) {

            //increment login attempt during time. Default time 60 sec, change in second arg.
            RateLimiter::hit($this->throttleKey());

            throw ValidationException::withMessages([
                'password' => trans('auth.password'),
            ]);
        }
        //clean login attempts counter
        RateLimiter::clear($this->throttleKey());
    }

    /**
     * Ensure the login request is not rate limited.
     *
     * @throws ValidationException
     */
    public function ensureIsNotRateLimited(): void
    {
        //check attempts to log in from same ip with same email
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        //no listener yet for this event. We can create email notification.
        event(new Lockout($this));

        //returns the number of seconds remaining until more attempts will be available
        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     */
    public function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->string('email')).'|'.$this->ip());
    }
}
