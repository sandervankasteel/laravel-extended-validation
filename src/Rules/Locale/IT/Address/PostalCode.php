<?php

namespace LaravelExtendedValidation\Rules\Locale\IT\Address;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Support\Stringable;

class PostalCode implements Rule
{
    /**
     * @var bool
     */
    private $allowVatican;

    /**
     * @var bool
     */
    private $allowSanMarino;

    /**
     * @var string[]
     */
    private $prefixes = [
        '000',
        '001',
        '002',
        '003',
        '004',
        '005',
        '006',
        '007',
        '008',
        '009',
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
        '20',
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
        '96',
        '97',
        '98',
    ];

    /**
     * @param bool $allowVatican
     * @param bool $allowSanMarino
     */
    public function __construct($allowVatican = false, $allowSanMarino = false)
    {
        $this->allowVatican = $allowVatican;
        $this->allowSanMarino = $allowSanMarino;

        if ($allowVatican) {
            $this->prefixes[] = '00120';
        }

        if ($allowSanMarino) {
            $this->prefixes[] = '4789';
        }
    }

    /**
     * @inheritDoc
     */
    public function passes($attribute, $value): bool
    {
        $postalCode = Str::of($value);

        return $postalCode->startsWith($this->prefixes) &&
            $postalCode->length() === 5 &&
            $postalCode->match('/\d{5}$/') == $value &&
            $this->allowVaticanPostalCode($postalCode) && // Vatican test
            $this->allowSansMarinoPostalCode($postalCode); // San Marino test
    }

    /**
     * @inheritDoc
     */
    public function message(): string
    {
        return ':attribute is not a valid Italian postal code';
    }

    /**
     * @param Stringable $postalCode
     * @return bool
     */
    private function allowVaticanPostalCode(Stringable $postalCode): bool
    {
        $isVaticanPostalCode = $postalCode->is('00120');

        if ($this->allowVatican && $isVaticanPostalCode) {
            return true;
        }

        if (! $this->allowVatican && $isVaticanPostalCode) {
            return false;
        }

        return true;
    }

    /**
     * @param Stringable $postalCode
     * @return bool
     */
    private function allowSansMarinoPostalCode(Stringable $postalCode): bool
    {
        $isSanMarinoPostalCode = $postalCode->startsWith('4789');

        if ($this->allowSanMarino && $isSanMarinoPostalCode) {
            return true;
        }

        if (! $this->allowSanMarino && $isSanMarinoPostalCode) {
            return false;
        }

        return true;
    }
}
