<?php

namespace LaravelExtendedValidation\Rules\Locale\IE\Address;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class PostalCode implements Rule
{
    /**
     * @inheritDoc
     */
    public function passes($attribute, $value)
    {
        $postalCode = Str::of($value)
            ->upper();

        if ($postalCode->replace(' ', '')->length() !== 7) {
            return false;
        }

        if ($postalCode->contains(['B', 'G', 'I', 'J', 'L', 'M', 'O', 'Q', 'S', 'U', 'Z'])) {
            return false;
        }

        $splitted = $postalCode->split('/ /');
        $routingKey = $splitted->first();
        $uniqueIdentifier = $splitted->last();

        $routingKeyRegex = ($routingKey === 'D6W') ? '([A-Z]\d{1}[A-Z])' : '/([A-Z]\d{2})/';
        $uniqueIdentifierRegex = '/(([A-Z0-9]){4})/';

        return $postalCode->match($routingKeyRegex) == $routingKey &&
            $postalCode->match($uniqueIdentifierRegex) == $uniqueIdentifier;
    }

    /**
     * @inheritDoc
     */
    public function message(): string
    {
        return ':attribute is not a valid Irish postal code (Eircode)';
    }
}
