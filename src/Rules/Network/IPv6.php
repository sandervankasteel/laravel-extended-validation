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
        return preg_match(
            '/^([\dA-Fa-f]{0,4}:){2,7}([\dA-Fa-f]{1,4}$|'.
            '((25[0-5]|2[0-4]\d|[01]?\d{2}?)(\.|$)){4})$/',
            $value
        ) > 0;
    }

    /**
     * @inheritDoc
     */
    public function message(): string
    {
        return ':attribute does not contain a valid IPv6 address';
    }
}
