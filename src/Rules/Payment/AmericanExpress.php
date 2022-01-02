<?php

namespace LaravelExtendedValidation\Rules\Payment;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class AmericanExpress implements Rule
{
    /**
     * @inheritDoc
     */
    public function passes($attribute, $value)
    {
        $number = Str::of($value)
            ->replace(' ', '');

        if ($number->length() !== 15) {
            return false;
        }

        if (! $number->startsWith(['34', '37'])) {
            return false;
        }

        $total = 0;
        $checkDigit = $number->substr(14, 1);
        $digits = collect(str_split($number->substr(0, 14)));

        $digits->reverse()->each(function ($number, $index) use (&$total, $value) {
            $multiplier = ($index % 2 === 0) ? 1 : 2;

            $subtotal = $number * $multiplier;

            if ($subtotal > 9) {
                $subtotal -= 9;
            }

            $total += $subtotal;
        });

        return abs(bcmod($total - 10, 10) - 10) == (string) $checkDigit;
    }

    /**
     * @inheritDoc
     */
    public function message()
    {
        return ':attribute does not contain a valid American Express credit card number';
    }
}
