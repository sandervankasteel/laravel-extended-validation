<?php

namespace LaravelExtendedValidation\Rules\Locale\SE\Company;

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

        if (! $vatNumber->startsWith('SE')) {
            return false;
        }

        return $vatNumber->match('(\d+)')->length() === 10;
    }

    /**
     * @inheritDoc
     */
    public function message(): string
    {
        return ':attribute does not contain a valid Swedish VAT number';
    }
}
