<?php

namespace LaravelExtendedValidation\Rules\Locale\JP\Address;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class PostalCode implements Rule
{
    /**
     * @inheritDoc
     */
    public function passes($attribute, $value): bool
    {
        $postalCode = Str::of($value);

        return $postalCode->match('/\d{3}-\d{4}/') == $value;
    }

    /**
     * @inheritDoc
     */
    public function message(): string
    {
        return ':attribute does not contain a valid Japanese postal code';
    }
}
