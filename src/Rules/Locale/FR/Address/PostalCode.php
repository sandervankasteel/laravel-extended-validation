<?php

namespace LaravelExtendedValidation\Rules\Locale\FR\Address;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class PostalCode implements Rule
{
    /**
     * @var string[]
     */
    private $startingRanges = [
        '00', // Military / Armed forces
        '01',
        '02',
        '03',
        '04',
        '05',
        '06',
        '07',
        '08',
        '09',
        '10',
        '11',
        '12',
        '13',
        '14',
        '15',
        '16',
        '17',
        '18',
        '19',
        '20', // Corsica
        '21',
        '22',
        '23',
        '24',
        '25',
        '26',
        '27',
        '28',
        '29',
        '30',
        '31',
        '32',
        '33',
        '34',
        '35',
        '36',
        '37',
        '38',
        '39',
        '40',
        '41',
        '42',
        '43',
        '44',
        '45',
        '46',
        '47',
        '48',
        '49',
        '50',
        '51',
        '52',
        '53',
        '54',
        '55',
        '56',
        '57',
        '58',
        '59',
        '60',
        '61',
        '62',
        '63',
        '64',
        '65',
        '66',
        '67',
        '68',
        '69',
        '70',
        '71',
        '72',
        '73',
        '74',
        '75',
        '76',
        '77',
        '78',
        '79',
        '80',
        '81',
        '82',
        '83',
        '84',
        '85',
        '86',
        '87',
        '88',
        '89',
        '90',
        '91',
        '92',
        '93',
        '94',
        '95',
    ];

    public function __construct(bool $allowMonaco = false)
    {
        if ($allowMonaco) {
            $this->startingRanges[] = '98';
        }
    }

    /**
     * @inheritDoc
     */
    public function passes($attribute, $value): bool
    {
        $postalCode = Str::of($value);

        if ($postalCode->length() !== 5) {
            return false;
        }

        return $postalCode->startsWith($this->startingRanges);
    }

    /**
     * @inheritDoc
     */
    public function message(): string
    {
        return ':attribute does not contain a valid French postalcode.';
    }
}
