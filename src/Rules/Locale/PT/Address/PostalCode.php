<?php

namespace LaravelExtendedValidation\Rules\Locale\PT\Address;

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

        return $postalCode->length() === 4 &&
            $postalCode->match('/\d{4}/') == $value;
    }

    /**
     * @inheritDoc
     */
    public function message(): string
    {
        return ':attribute is not a valid Portugese postal code';
    }
}
