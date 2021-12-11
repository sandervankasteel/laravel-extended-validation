<?php

namespace LaravelExtendedValidation\Rules\DateAndTime;

use DateTime;
use Illuminate\Contracts\Validation\Rule;

class UnixTime implements Rule
{
    public function passes($attribute, $value): bool
    {
        if (! is_numeric($value)) {
            return false;
        }

        $dateTime = DateTime::createFromFormat('U', $value);

        return $dateTime !== false;
    }

    public function message(): string
    {
        return ':attribute does not contain a valid UNIX timestamp';
    }
}
