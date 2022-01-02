<?php

namespace LaravelExtendedValidation\Rules\Locale\DE\Address;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class PostalCode implements Rule
{
    private $invalidRanges = [
        '00', // Not assigned
        '05', // Reserved
        '43', // Reserved
        '62', // Reserved
    ];

    /**
     * @inheritDoc
     */
    public function passes($attribute, $value)
    {
        $postalCode = Str::of($value);

        if ($postalCode->length() !== 5) {
            return false;
        }

        if ($postalCode->startsWith($this->invalidRanges)) {
            return false;
        }

        // Theoretically any number between 01000 and 99999 could be assigned to any region.
        return (int) (string) $postalCode >= 1000 && (int) (string) $postalCode <= 99999;
    }

    /**
     * @inheritDoc
     */
    public function message()
    {
        return ':attribute does not contain a valid German postalcode.';
    }
}
