<?php

namespace LaravelExtendedValidation\Rules\Locale\GR\Address;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class PostalCode implements Rule
{
    public function passes($attribute, $value): bool
    {
        $postalCode = Str::of($value);

        return (string) $postalCode->match('/\d{5}/') === $value;
    }

    public function message(): string
    {
        return ':attribute does not contain a valid Greek postal code';
    }
}
