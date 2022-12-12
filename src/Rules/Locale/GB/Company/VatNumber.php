<?php

namespace LaravelExtendedValidation\Rules\Locale\GB\Company;

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
            ->split('/GB/')
            ->filter()
            ->first();

        if (! Str::of($value)->upper()->startsWith('GB')) {
            return false;
        }

        if (Str::of($numbers)->length() !== 9 && Str::of($numbers)->length() !== 12) {
            return false;
        }

        return true;
    }

    /**
     * @inheritDoc
     */
    public function message(): string
    {
        return ':attribute does not contain a valid British VAT number';
    }
}
