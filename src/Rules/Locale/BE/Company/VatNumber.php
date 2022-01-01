<?php

namespace LaravelExtendedValidation\Rules\Locale\BE\Company;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class VatNumber implements Rule
{
    /**
     * @inheritDoc
     */
    public function passes($attribute, $value)
    {
        /** @var string $numbers */
        $numbers = Str::of($value)
            ->replace('.', '')
            ->upper()
            ->split('/BE/')
            ->filter()
            ->first();

        if (! Str::of($value)->upper()->startsWith('BE') || Str::of($numbers)->length() !== 10) {
            return false;
        }

        return abs(
            bcmod(Str::of($numbers)->limit(8, ''), '97') - 97
            ) == substr($numbers, -2);
    }

    /**
     * @inheritDoc
     */
    public function message()
    {
        return ':attribute does not contain a valid Belgium VAT number';
    }
}
