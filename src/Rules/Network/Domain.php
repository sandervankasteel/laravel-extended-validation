<?php

namespace LaravelExtendedValidation\Rules\Network;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class Domain implements Rule
{
    /**
     * @inheritDoc
     */
    public function passes($attribute, $value): bool
    {
        $domain = Str::of($value);

        return $domain->match('/^((?!-)[A-Za-z0-9-]{1,63}(?<!-)\\.)+[A-Za-z]{2,}$/')->length() !== 0;
    }

    /**
     * @inheritDoc
     */
    public function message(): string
    {
        return ':attribute is not a valid domain name';
    }
}
