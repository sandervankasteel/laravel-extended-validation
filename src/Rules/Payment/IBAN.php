<?php

namespace LaravelExtendedValidation\Rules\Payment;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class IBAN implements Rule
{
    public function passes($attribute, $value): bool
    {
        $countryCodeRegex = '/(^[A-Z][A-Z][0-9][0-9])/';

        $value = Str::of($value)
            ->upper()
            ->replace(' ', '')
            ->replaceMatches($countryCodeRegex, '')
            ->append(Str::of($value)->match($countryCodeRegex))
            ->replaceMatches('/^([A-Z])([A-Z])([A-Z])([A-Z])/', function ($matches) {
                return $this->transposeLettersToNumbers($matches);
            })
            ->replaceMatches('/([A-Z])/', function ($matches) {
                return $this->transposeLettersToNumbers($matches);
            });

        return bcmod($value, '97') === '1';
    }

    public function message()
    {
        return 'The :attribute does not contain a valid IBAN number';
    }

    private function transposeLettersToNumbers(array $matches): string
    {
        $alphabet = range('A', 'Z');
        $replacedValues = '';

        for ($i = 1; $i < count($matches); $i++) {
            $match = $matches[$i];
            $replacedValues .= (int) array_search($match, $alphabet) + 10;
        }

        return $replacedValues;
    }
}
