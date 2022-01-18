<?php

namespace LaravelExtendedValidation\Rules\Locale\SK\Address;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class PostalCode implements Rule
{
    /**
     * @var string[]
     */
    private $allowedStartingRanges = [];

    public function __construct()
    {
        $this->allowedStartingRanges = collect(range(1, 63))->map(static function ($item) {
            return ($item < 10) ? '0'.$item : (string) $item;
        })->toArray();
    }

    /**
     * @inheritDoc
     */
    public function passes($attribute, $value)
    {
        $postalCode = Str::of($value);

        if ($postalCode->length() !== 5) {
            return false;
        }

        return $postalCode->startsWith($this->allowedStartingRanges) &&
            (string) $postalCode->match('/(\d{5})/') !== '';
    }

    /**
     * @inheritDoc
     */
    public function message(): string
    {
        return ':attribute does not contain a valid South Korean postal code';
    }
}
