<?php

namespace LaravelExtendedValidation\Rules\Locale\FR\Company;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class VatNumber implements Rule
{
    /**
     * @inheritDoc
     */
    public function passes($attribute, $value): bool
    {
        /** @var string $numbers */
        $numbers = Str::of($value)
            ->replace(' ', '')
            ->upper()
            ->split('/FR/')
            ->filter()
            ->first();

        if (! Str::of($value)->upper()->startsWith('FR') || Str::of($numbers)->length() !== 11) {
            return false;
        }

        $siren = substr($numbers, 2);

        return (12 + 3 * bcmod($siren, '97')) == substr($numbers, 0, 2);
    }

    /**
     * @inheritDoc
     */
    public function message(): string
    {
        return ':attribute does not contain a valid French VAT number';
    }
}
