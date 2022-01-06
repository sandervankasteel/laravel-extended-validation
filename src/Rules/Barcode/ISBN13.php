<?php

namespace LaravelExtendedValidation\Rules\Barcode;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class ISBN13 implements Rule
{
    /**
     * @inheritDoc
     */
    public function passes($attribute, $value): bool
    {
        $value = collect(
            str_split(
                Str::of($value)
                ->replaceMatches('/[- _]/', '')
            )
        );

        if ($value->count() !== 13) {
            return false;
        }

        $total = 0;
        $value->each(static function ($item, $index) use (&$total) {
            // We use a multiplier of 1 for an odd index and 3 for an even index
            $multiplier = ($index % 2 === 0) ? 1 : 3;

            $total += (int) $item * $multiplier;
        });

        return ($total % 10) === 0;
    }

    /**
     * @inheritDoc
     */
    public function message(): string
    {
        return ':attribute does not have a valid ISBN13 number';
    }
}
