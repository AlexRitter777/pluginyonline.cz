<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class SummernoteContent implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $textOnly = strip_tags($value);
        $textOnly = trim(preg_replace('/\x{A0}+/u', '', html_entity_decode($textOnly, ENT_QUOTES, 'UTF-8')));
        if(empty($textOnly)){
            $fail('The :attribute is required.');
        };

    }
}
