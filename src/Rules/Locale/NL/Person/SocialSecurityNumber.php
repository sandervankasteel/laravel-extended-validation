<?php

namespace LaravelExtendedValidation\Rules\Locale\NL\Person;

use Illuminate\Contracts\Validation\Rule;

/**
 * Class SocialSecurityNumber.
 * This validation is based on he so called '11-proef'. (More info: https://nl.wikipedia.org/wiki/Burgerservicenummer#11-proef)
 * And is in no way, a verification of the BSN number actually exist and has been given to a person!
 */
class SocialSecurityNumber implements Rule
{
    /**
     * @inheritDoc
     */
    public function passes($attribute, $value)
    {
        if (strlen($value) !== 9) {
            return false;
        }

        $values = collect(str_split($value));

        $total = 0;
        $values->each(static function ($item, $index) use (&$total) {
            $multiplier = 9 - $index;

            // For the last number, we need to multiple by -1 instead of the inverse of the index.
            if ($index === 8) {
                $total += ($item) * -1;

                return;
            }

            $total += ($item) * $multiplier;
        });

        return ($total % 11) === 0;
    }

    /**
     * @inheritDoc
     */
    public function message()
    {
        return 'The :attribute is not considered a valid Burger Service Nummer (Social Security number)';
    }
}
