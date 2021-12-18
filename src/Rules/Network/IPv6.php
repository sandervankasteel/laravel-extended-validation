<?php

namespace LaravelExtendedValidation\Rules\Network;

use Illuminate\Support\Str;

class IPv6 implements \Illuminate\Contracts\Validation\Rule
{

    /**
     * @inheritDoc
     */
    public function passes($attribute, $value): bool
    {
        // Based on this Stackoverflow answer: https://stackoverflow.com/a/5567938
        return preg_match("/^([0-9A-Fa-f]{0,4}:){2,7}([0-9A-Fa-f]{1,4}$|".
            "((25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)(\.|$)){4})$/",
            $value
        );
    }

    /**
     * @inheritDoc
     */
    public function message(): string
    {
        return ':attribute does not contain a valid IPv6 address';
    }
}