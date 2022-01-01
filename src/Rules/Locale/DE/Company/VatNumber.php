<?php

namespace LaravelExtendedValidation\Rules\Locale\DE\Company;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class VatNumber implements Rule
{
    /**
     * @inheritDoc
     */
    public function passes($attribute, $value)
    {
        $string = Str::of($value)
            ->upper()
            ->replace(' ', '');

        return $string->startsWith('DE') && $string->test('/[0-9]{9}/');
    }

    /**
     * @inheritDoc
     */
    public function message()
    {
        return ':attribute does not contain a valid German VAT number';
    }
}
