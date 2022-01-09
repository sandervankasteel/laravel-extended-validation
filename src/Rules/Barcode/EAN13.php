<?php

namespace LaravelExtendedValidation\Rules\Barcode;

use Illuminate\Contracts\Validation\Rule;

class EAN13 implements Rule
{
    /**
     * @inheritDoc
     */
    public function passes($attribute, $value): bool
    {
        $barcode = collect(str_split($value));

        if ($barcode->count() !== 13) {
            return false;
        }

        $checkSumChar = (int) $barcode->last();

        $total = 0;
        $barcode->slice(0, 12)->each(function ($number, $index) use (&$total) {
            $multiplier = ($index % 2 === 0) ? 1 : 3;

            $total += (int) $number * $multiplier;
        });

        $checksum = (int) (ceil($total / 10) * 10) - $total;

        return $checkSumChar === $checksum;
    }

    /**
     * @inheritDoc
     */
    public function message(): string
    {
        return ':attribute does not contain a valid EAN-13 code';
    }
}
