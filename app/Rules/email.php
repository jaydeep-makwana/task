<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class email implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return $value == filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        # get value dynamically of name attribute using ":attribute"
        return 'invalid :attribute format.';
    }
}
