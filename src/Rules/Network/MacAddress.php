<?php

namespace LaravelExtendedValidation\Rules\Network;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class MacAddress implements Rule
{
    private $separatorSign;

    public function __construct($separatorSign = ':')
    {
        $this->separatorSign = $separatorSign;
    }

    public function passes($attribute, $value): bool
    {
        $values = Str::of($value)
            ->replace($this->separatorSign, ':');

        return filter_var($values, FILTER_VALIDATE_MAC) !== false;
    }

    public function message(): string
    {
        return ':attribute does not contain a valid MAC address';
    }
}
