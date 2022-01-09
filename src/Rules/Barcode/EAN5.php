<?php

namespace LaravelExtendedValidation\Rules\Barcode;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class EAN5 implements Rule
{
    /**
     * @inheritDoc
     */
    public function passes($attribute, $value): bool
    {
        $barcode = Str::of($value);

        if ($barcode->length() !== 5) {
            return false;
        }

        return true;
    }

    /**
     * @inheritDoc
     */
    public function message(): string
    {
        return ':attribute does not contain a valid EAN-5 code';
    }
}
