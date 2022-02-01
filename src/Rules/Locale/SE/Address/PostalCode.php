<?php

namespace LaravelExtendedValidation\Rules\Locale\SE\Address;

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

        return (string) $postalCode->match('/\d{3} \d{2}/') === $value;
    }

    /**
     * @inheritDoc
     */
    public function message(): string
    {
        return ':attribute does not contain a validate Swedish postal code';
    }
}
