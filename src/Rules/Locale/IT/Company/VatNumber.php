<?php

namespace LaravelExtendedValidation\Rules\Locale\IT\Company;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class VatNumber implements Rule
{
    /**
     * @inheritDoc
     */
    public function passes($attribute, $value): bool
    {
        $vatNumber = Str::of($value)
            ->upper();

        if ($vatNumber->length() !== 13) {
            return false;
        }

        if (! $vatNumber->startsWith('IT')) {
            return false;
        }

        return (string) $vatNumber->match('/\d{11}/') !== '';
    }

    /**
     * @inheritDoc
     */
    public function message(): string
    {
        return ':attribute does not contain a valid Italian VAT number';
    }
}
