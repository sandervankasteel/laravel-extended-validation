<?php

namespace LaravelExtendedValidation\Rules\Color;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class RGBA implements Rule
{
    /**
     * @inheritDoc
     */
    public function passes($attribute, $value)
    {
        $rgb = Str::of($value)
            ->replace(' ', '')
            ->lower();

        if (! $rgb->length() >= 11 && ! $rgb->length() <= 17) {
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
        $colourCodes = $rgb->matchAll('/(\d(?!\.)\d(-?[0-9]+))/');
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

        $transparancyCode = (string) $rgb->match('(\d\.\d)');
        // Check if transparancy is present OR (the transparancy amount is below 0 OR above 1)
        if($transparancyCode === "" || ((double) $transparancyCode < 0 || (double) $transparancyCode > 1)) {
            $passed = false;
        }

        return $passed;
    }

    /**
     * @inheritDoc
     */
    public function message()
    {
        return ':attribute does not contain a valid RGBA color';
    }
}
