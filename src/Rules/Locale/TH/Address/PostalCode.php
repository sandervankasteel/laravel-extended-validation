<?php

namespace LaravelExtendedValidation\Rules\Locale\TH\Address;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class PostalCode implements Rule
{
    /**
     * The start and ending ranges of postal codes according to
     * @url https://en.wikipedia.org/wiki/Postal_codes_in_Thailand
     * @var int[]
     */
    private $allowedRanges = [
        10000 => 18999, // Central zone
        20000 => 27999, // Eastern zone
        30000 => 39999, // Northeastern part 1
        40000 => 49999, // Northeastern part 2
        50000 => 58999, // Upper Northern zone
        60000 => 67999, // Lower Northern zone
        70000 => 77999, // Lower Central zone
        80000 => 86999, // Southern zone
        90000 => 96999 // Southern border zone
    ];

    /**
     * @inheritDoc
     */
    public function passes($attribute, $value): bool
    {
        $postalCode = Str::of($value);

        if ($postalCode->length() !== 5) {
            return false;
        }

        $postalCode = (int) $value;

        $foundMatches = collect($this->allowedRanges)
            ->map(static function ($endRange, $startRange) use ($postalCode) {
                return (
                    $postalCode >= $startRange &&
                    $postalCode <= $endRange
                );
            })
            ->filter();

        // We expect to only find the postal code in 1 range
        return $foundMatches->count() === 1;
    }

    /**
     * @inheritDoc
     */
    public function message(): string
    {
        return ':attribute does not contain a valid Thai postal code';
    }
}