<?php

namespace LaravelExtendedValidation\Rules\Locale\DK\Address;

use Illuminate\Support\Str;

class PostalCode implements \Illuminate\Contracts\Validation\Rule
{
    /**
     * @inheritDoc
     */
    public function passes($attribute, $value): bool
    {
        $postalCode = Str::of($value);

        return (string) $postalCode->match('/\d{4}/') === $value;
    }

    /**
     * @inheritDoc
     */
    public function message(): string
    {
        return ':attribute does not contain a validate Danish postal code';
    }
}
