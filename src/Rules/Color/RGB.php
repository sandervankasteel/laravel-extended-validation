<?php

namespace LaravelExtendedValidation\Rules\Color;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class RGB implements Rule
{
    /**
     * @inheritDoc
     */
    public function passes($attribute, $value): bool
    {
        $rgb = Str::of($value)
            ->replace(' ', '')
            ->lower();

        if ($rgb->length() <= 10 || $rgb->length() > 16) {
            return false;
        }

        if (! $rgb->startsWith('rgb') || $rgb->startsWith('rgba')) {
            return false;
        }

        // check for the 2 braces
        if (! $rgb->contains('(') || ! $rgb->contains(')')) {
            return false;
        }

        // split
        $colourCodes = $rgb->matchAll('/(-?[0-9]+)/');
        if ($colourCodes->count() !== 3) {
            return false;
        }

        return $colourCodes->filter(function ($item) {
            return (int) $item >= 0 && (int) $item <= 255;
        })->count() === 3;
    }

    /**
     * @inheritDoc
     */
    public function message(): string
    {
        return ':attribute does not contain a valid RGB color';
    }
}
