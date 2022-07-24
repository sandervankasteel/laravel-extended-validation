<?php

namespace LaravelExtendedValidation\Rules\Locale\GB\Address;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class PostalCode implements Rule
{
    /**
     * @var bool
     */
    private $allowSpecialCases;

    public function __construct(bool $allowSpecialCases = false)
    {
        $this->allowSpecialCases = $allowSpecialCases;
    }

    /**
     * @inheritDoc
     */
    public function passes($attribute, $value): bool
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
    public function message(): string
    {
        if ($this->allowSpecialCases) {
            return ':attribute must contain a valid GB (or British Overseas Territories) postal code';
        }

        return ':attribute must contain a valid GB postal code. Not including British Overseas Territories.';
    }
}
