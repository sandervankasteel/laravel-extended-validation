<?php

namespace LaravelExtendedValidation\Rules\Locale\GR\Company;

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

        if (! $vatNumber->startsWith('EL')) {
            return false;
        }

        return $vatNumber->match('/(\d+)/')->length() === 9;
    }

    /**
     * @inheritDoc
     */
    public function message(): string
    {
        return ':attribute is not a valid Greek VAT number';
    }
}
