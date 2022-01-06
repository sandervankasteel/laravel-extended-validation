<?php

namespace LaravelExtendedValidation\Rules\Payment;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class Visa implements Rule
{
    /**
     * @inheritDoc
     */
    public function passes($attribute, $value): bool
    {
        $number = Str::of($value)
            ->replace(' ', '');

        $length = $number->length();

        if ($length !== 13 && $length !== 16) {
            return false;
        }

        if (! $number->startsWith(['4'])) {
            return false;
        }

        $total = 0;
        $checkDigit = $number->substr($length - 1, 1);
        $digits = collect(str_split($number->substr(0, $length - 1)));

        $digits->reverse()->each(function ($number, $index) use (&$total, $length) {
            $multiplier = ($index % 2 === 0) ? 2 : 1;

            if ($length === 13) {
                $multiplier = ($index % 2 === 0) ? 1 : 2;
            }

            $subtotal = (int) $number * $multiplier;

            if ($subtotal > 9) {
                $subtotal -= 9;
            }

            $total += $subtotal;
        });

        return abs(bcmod((string) $total, '10') - 10) == (string) $checkDigit;
    }

    /**
     * @inheritDoc
     */
    public function message(): string
    {
        return ':attribute does not contain a valid VISA credit card number';
    }
}
