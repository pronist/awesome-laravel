<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\InvokableRule;

class Password implements InvokableRule
{
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     * @return void
     */
    public function __invoke($attribute, $value, $fail)
    {
        if (preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/', $value)) {
            //$fail('The :attribute must contain at least one lowercase letter, one uppercase letter, one number, and one special character.');
            $fail('validation.regex')->translate();
        }
    }
}
