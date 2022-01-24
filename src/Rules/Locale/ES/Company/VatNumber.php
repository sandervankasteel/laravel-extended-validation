<?php

namespace LaravelExtendedValidation\Rules\Locale\ES\Company;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class VatNumber implements Rule
{
    public function passes($attribute, $value): bool
    {
        $vatNumber = Str::of($value)
            ->upper();

        $numbers = $vatNumber->match('/(\d{9}|\d{8})/');

        return $vatNumber->startsWith('ES') &&
            $vatNumber->length() === 11 &&
            ($numbers->length() === 8 || $numbers->length() === 9);
    }

    public function message(): string
    {
        return ':attribute does not contain a Spanish VAT number';
    }
}
