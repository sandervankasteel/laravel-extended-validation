<?php

namespace LaravelExtendedValidation\Rules\Locale\NL\Company;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class VatNumber implements Rule
{
    /**
     * @inheritDoc
     */
    public function passes($attribute, $value): bool
    {
        $value = Str::of($value)
            ->upper();

        if (! $value->startsWith('NL')) {
            return false;
        }

        if (! $value->contains('B')) {
            return false;
        }

        $splittedValue = $value->split('/B/');

        if (strlen($splittedValue->get(1)) !== 2) {
            return false;
        }

        $numbers = collect(
            str_split(Str::of($splittedValue->get(0))
                ->explode('NL')
                ->filter()
                ->values()
                ->first()
            ));

        $total = 0;
        $numbers->each(static function ($item, $index) use (&$total) {
            $multiplier = 9 - $index;

            // For the last number, we need to substract it from the total number
            if ($index === 8) {
                $total -= $item;

                return;
            }

            $total += (int) $item * $multiplier;
        });

        return ($total % 11) === 0;
    }

    /**
     * @inheritDoc
     */
    public function message(): string
    {
        return ':attribute does not contain a valid Dutch VAT number';
    }
}
