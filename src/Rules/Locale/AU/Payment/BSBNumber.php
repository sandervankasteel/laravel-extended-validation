<?php

namespace LaravelExtendedValidation\Rules\Locale\AU\Payment;

use Illuminate\Contracts\Validation\Rule;

class BSBNumber implements Rule
{
    /**
     * @inheritDoc
     */
    public function passes($attribute, $value): bool
    {
        return (preg_match('/^(\d{3}-\d{3})$/', $value) ||
            preg_match('/^(\d{6})$/', $value)) === true;
    }

    /**
     * @inheritDoc
     */
    public function message(): string
    {
        return 'The :attribute does not contain a valid BSB number';
    }
}
