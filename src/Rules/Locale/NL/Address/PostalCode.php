<?php
namespace SandervanKasteel\LaravelExtendedValidation\Rules\Locale\NL\Address;

use Illuminate\Contracts\Validation\Rule;

class PostalCode implements Rule
{
    private $mayContainSpace;

    private $blockedlistedLetterSequences = [
        'SA',
        'SD',
        'SS',
    ];

    /**
     * PostalCode constructor.
     * @param false $mayContainSpace
     */
    public function __construct(bool $mayContainSpace = false)
    {
        $this->mayContainSpace = $mayContainSpace;
    }

    /**
     * @inheritDoc
     */
    public function passes($attribute, $value)
    {
        $value = trim($value);

        // Strip out any spaces
        if($this->mayContainSpace) {
            $value = str_replace(' ', '', $value);
        }

        // If the length isn't 6 chars, then it's invalid
        if(strlen($value) !== 6) {
            return false;
        }

        // If the input is '1234AB' then element 0 is '1234' and element 1 is 'AB'
        $sequence = str_split($value, 4);

        if(!is_numeric($sequence[0])) {
            return false;
        }

        if(! ((int) $sequence[0] >= 1000 && (int) $sequence[0] <= 9999)) {
            return false;
        }

        if(strlen($sequence[1]) !== 2 || in_array($sequence[1], $this->blockedlistedLetterSequences, true)) {
            return false;
        }

        return true;
    }

    /**
     * @inheritDoc
     */
    public function message()
    {
        if($this->mayContainSpace) {
            return "The :attribute must be in the '1234 AB' format";
        }

        return "The :attribute must be in the '1234AB' format";
    }
}
