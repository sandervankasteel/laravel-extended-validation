<?php

namespace LaravelExtendedValidation\Rules\Barcode;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class ASIN implements Rule
{
    /**
     * @inheritDoc
     */
    public function passes($attribute, $value): bool
    {
        $barcode = Str::of($value)
            ->matchAll('/[a-zA-Z0-9]/')
            ->join('');

        if (strlen($barcode) !== 10) {
            return false;
        }

        return $value === (string) $barcode;
    }

    /**
     * @inheritDoc
     */
    public function message(): string
    {
        return ':attribute does not have a valid ASIN number';
    }
}
