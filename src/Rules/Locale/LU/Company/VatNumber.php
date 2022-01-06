<?php

namespace LaravelExtendedValidation\Rules\Locale\LU\Company;

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
            ->upper()
            ->split('/LU/')
            ->filter()
            ->first();

        if (! Str::of($value)->upper()->startsWith('LU') || Str::of($numbers)->length() !== 8) {
            return false;
        }

        return bcmod(Str::of($numbers)->limit(6, ''), '89') == substr($numbers, -2);
    }

    /**
     * @inheritDoc
     */
    public function message(): string
    {
        return ":attribute does not contain a valid Luxembourg's VAT number";
    }
}
