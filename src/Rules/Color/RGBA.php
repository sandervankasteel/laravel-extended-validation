<?php

namespace LaravelExtendedValidation\Rules\Color;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class RGBA implements Rule
{
    /**
     * @inheritDoc
     */
    public function passes($attribute, $value): bool
    {
        $rgb = Str::of($value)
            ->replace(' ', '')
            ->lower();

        if ($rgb->length() <= 11 || $rgb->length() > 21) {
            return false;
        }

        if (! $rgb->startsWith('rgba')) {
            return false;
        }

        // check for the 2 braces
        if (! $rgb->contains('(') || ! $rgb->contains(')')) {
            return false;
        }

        // split
        $colourCodes = $rgb->matchAll('/(\d+),/');
        if ($colourCodes->count() !== 3) {
            return false;
        }

        $passed = $colourCodes->filter(function ($item) {
            return (int) $item >= 0 && (int) $item <= 255;
        })->count() === 3;

        if (! $passed) {
            return false;
        }

        $transparencyCode = (string) $rgb->match('/(\d\.\d)/');
        // Check if transparency is present OR (the transparency amount is below 0 OR above 1)
        if ($transparencyCode === '' || ((float) $transparencyCode < 0 || (float) $transparencyCode > 1)) {
            $passed = false;
        }

        return $passed;
    }

    /**
     * @inheritDoc
     */
    public function message(): string
    {
        return ':attribute does not contain a valid RGBA color';
    }
}
