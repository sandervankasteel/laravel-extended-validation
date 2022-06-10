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
        return (preg_match('/^([0-9]{3}-[0-9]{3})$/', $value) ||
            preg_match('/^([0-9]{6})$/', $value)) === true;
    }

    /**
     * @inheritDoc
     */
    public function message(): string
    {
        return 'The :attribute does not contain a valid BSB number';
    }
}
