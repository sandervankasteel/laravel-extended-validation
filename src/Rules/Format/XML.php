<?php

namespace LaravelExtendedValidation\Rules\Format;

class XML implements \Illuminate\Contracts\Validation\Rule
{

    /**
     * @inheritDoc
     */
    public function passes($attribute, $value)
    {
        $xml = simplexml_load_string($value);

        return $xml instanceof SimpleXMLElement::class;
    }

    /**
     * @inheritDoc
     */
    public function message()
    {
        return ':attribute does not contain valid XML'
    }
}