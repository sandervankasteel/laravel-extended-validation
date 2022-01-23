<?php

namespace LaravelExtendedValidation\Rules\Payment;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class DiscoverCard implements Rule
{
    /**
     * @var string[]
     */
    private $startingRanges = [
        '30',
        '31',
        '33',
        '35',
        '36', // IIN 14-19 range
        '38',
        '39',
        '60',
        '62',
        '64',
        '81',
    ];

    /**
     * @inheritDoc
     */
    public function passes($attribute, $value): bool
    {
        $creditCardNumber = Str::of($value)
                            ->replace(['-', '_', '.', ' '], '');

        $length = $creditCardNumber->length();

        if (! $creditCardNumber->startsWith($this->startingRanges)) {
            return false;
        }

        if (! ($length >= 14 && $length <= 19)) {
            return false;
        }

        $total = 0;
        $checkDigit = $creditCardNumber->substr($length - 1, 1);
        $digits = collect(str_split($creditCardNumber->substr(0, $length - 1)));

        $digits->reverse()->each(function ($number, $index) use (&$total) {
            $multiplier = ($index % 2 === 0) ? 2 : 1;

            $subtotal = (int) $number * $multiplier;

            if ($subtotal > 9) {
                $subtotal -= 9;
            }

            $total += $subtotal;
        });

        return abs(bcmod((string) ($total - 10), '10') - 10) == (string) $checkDigit;
    }

    /**
     * @inheritDoc
     */
    public function message(): string
    {
        return ':attribute does not contain a valid Discover Card number';
    }
}
