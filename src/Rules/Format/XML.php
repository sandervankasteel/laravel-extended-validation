<?php

namespace LaravelExtendedValidation\Rules\Format;

use Illuminate\Contracts\Validation\Rule;
use SimpleXMLElement;

class XML implements Rule
{

    /**
     * @inheritDoc
     */
    public function passes($attribute, $value): bool
    {
        /** We are doing our own checking */
        libxml_use_internal_errors(true);

        $xml = simplexml_load_string($value, SimpleXMLElement::class);

        return $xml instanceof SimpleXMLElement;

    }

    /**
     * @inheritDoc
     */
    public function message()
    {
        return ':attribute does not contain valid XML';
    }
}