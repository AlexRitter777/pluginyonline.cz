<?php

namespace App\Rules;

use App\Services\SlugGenerator;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class UniqueCurrentSlug implements ValidationRule
{
    protected SlugGenerator $slugGenerator;

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function __construct(
        SlugGenerator $slugGenerator
    )
    {
        $this->slugGenerator = $slugGenerator;
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if($this->slugGenerator->isSlugExists($value)){
            $fail('The :attribute is already exists. Try another one.');
        };
    }
}
