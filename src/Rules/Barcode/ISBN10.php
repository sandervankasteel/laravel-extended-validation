<?php

namespace SandervanKasteel\LaravelExtendedValidation\Rules\Barcode;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class ISBN10 implements Rule
{
    /**
     * @inheritDoc
     */
    public function passes($attribute, $value): bool
    {
        $values = collect(
            str_split(
                Str::of($value)
                ->replaceMatches('/[- _]/', '')
            )
        );

        if ($values->count() !== 10) {
            return false;
        }

        $total = 0;
        $values->each(static function ($item, $index) use (&$total) {
            $multiplier = 10 - $index;

            $total += ($item) * $multiplier;
        });

        return ($total % 11) === 0;
    }

    /**
     * @inheritDoc
     */
    public function message()
    {
        return ':attribute does not contain a valid ISBN10 number';
    }
}
