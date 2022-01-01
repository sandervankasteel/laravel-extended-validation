<?php

namespace LaravelExtendedValidation\Rules\Locale\UK\Address;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class PostalCode implements Rule
{
    private $allowSpecialCases;

    public function __construct($allowSpecialCases = false)
    {
        $this->allowSpecialCases = $allowSpecialCases;
    }

    /**
     * @inheritDoc
     */
    public function passes($attribute, $value)
    {
        $regex = '/^[A-Z]{1,2}[0-9][A-Z0-9]? ?[0-9][A-Z]{2}$/';

        if ($this->allowSpecialCases) {
            $regex = '/^(([A-Z]{1,2}[0-9][A-Z0-9]?|ASCN|STHL|TDCU|BBND|[BFS]IQQ|PCRN|TKCA) ?[0-9][A-Z]{2}|BFPO ?[0-9]{1,4}|(KY[0-9]|MSR|VG|AI)[ -]?[0-9]{4}|[A-Z]{2} ?[0-9]{2}|GE ?CX|GIR ?0A{2}|SAN ?TA1)$/';
        }

        return (string) Str::of($value)->match($regex) === $value;
    }

    /**
     * @inheritDoc
     */
    public function message()
    {
        if ($this->allowSpecialCases) {
            return ':attribute must contain a valid UK (or British Overseas Territories) postal code';
        }

        return ':attribute must contain a valid UK postal code. Not including British Overseas Territories.';
    }
}
