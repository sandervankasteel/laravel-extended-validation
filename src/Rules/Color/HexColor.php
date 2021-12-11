<?php

namespace SandervanKasteel\LaravelExtendedValidation\Rules\Color;

use Illuminate\Contracts\Validation\Rule;

class HexColor implements Rule
{
    /**
     * @inheritDoc
     */
    public function passes($attribute, $value)
    {
        if (strlen($value) > 7) {
            return false;
        }

        $startsWithHashSign = str_starts_with($value, '#');
        $colourCodes = explode('#', $value);

        $colours = str_split(
            ($startsWithHashSign) ? $colourCodes[1] : $value,
        2);

        $validColourRange = false;

        collect($colours)->each(static function ($colourCode) use (&$validColourRange) {
            if ((int) hexdec($colourCode) <= 255 || strlen($colourCode) <= 2) {
                $validColourRange = true;
            }
        });

        return $validColourRange;
    }

    /**
     * @inheritDoc
     */
    public function message()
    {
        return 'The :attribute does not contain a valid hex color';
    }
}
