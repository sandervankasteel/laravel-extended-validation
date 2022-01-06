<?php

namespace LaravelExtendedValidation\Rules\Payment;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class MasterCard implements Rule
{
    /**
     * @inheritDoc
     */
    public function passes($attribute, $value): bool
    {
        $number = Str::of($value)
            ->replace(' ', '');

        if ($number->length() !== 16) {
            return false;
        }

        if (! $number->startsWith(['22', '23', '24', '25', '26', '27', '51', '52', '53', '54', '55'])) {
            return false;
        }

        $total = 0;
        $checkDigit = $number->substr(15, 1);
        $digits = collect(str_split($number->substr(0, 15)));

        $digits->reverse()->each(function ($number, $index) use (&$total) {
            $multiplier = ($index % 2 === 0) ? 2 : 1;

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
        return ':attribute does not contain a valid MasterCard credit card number';
    }
}
