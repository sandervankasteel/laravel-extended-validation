<?php

namespace LaravelExtendedValidation\Rules\Color;

use Illuminate\Support\Str;

class RGB implements \Illuminate\Contracts\Validation\Rule
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

        $passed = true;
        $colourCodes->each(function ($rgbCode) use (&$passed) {
            if ((int) $rgbCode <= 0 || (int) $rgbCode >= 256) {
                $passed = false;

                return false;
            }
        });

        return $passed;
    }

    /**
     * @inheritDoc
     */
    public function message(): string
    {
        return ':attribute does not contain a valid RGB color';
    }
}
