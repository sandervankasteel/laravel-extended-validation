<?php

namespace LaravelExtendedValidation\Rules\Locale\TW\Address;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class PostalCode implements Rule
{

    protected $firstOctet = [
        '100',
        '103',
        '104',
        '105',
        '106',
        '108',
        '110',
        '111',
        '112',
        '114',
        '115',
        '116',
        '200',
        '201',
        '202',
        '203',
        '204',
        '205',
        '206',
        '207',
        '208',
        '209',
        '210',
        '211',
        '212',
        '220',
        '221',
        '222',
        '223',
        '224',
        '226',
        '227',
        '228',
        '231',
        '232',
        '233',
        '234',
        '235',
        '236',
        '237',
        '238',
        '239',
        '241',
        '242',
        '243',
        '244',
        '247',
        '248',
        '249',
        '251',
        '252',
        '253',
        '253',
        '253',
        '260',
        '261',
        '262',
        '263',
        '264',
        '265',
        '266',
        '267',
        '268',
        '269',
        '270',
        '272',
        '290',
        '300',
        '302',
        '303',
        '304',
        '305',
        '306',
        '307',
        '308',
        '310',
        '311',
        '312',
        '313',
        '314',
        '315',
        '320',
        '324',
        '325',
        '326',
        '327',
        '328',
        '330',
        '333',
        '334',
        '335',
        '336',
        '337',
        '338',
        '350',
        '351',
        '352',
        '353',
        '354',
        '356',
        '357',
        '358',
        '360',
        '361',
        '362',
        '363',
        '364',
        '365',
        '366',
        '367',
        '368',
        '369',
        '400',
        '401',
        '402',
        '403',
        '404',
        '406',
        '407',
        '408',
        '411',
        '412',
        '413',
        '414',
        '420',
        '421',
        '422',
        '423',
        '424',
        '426',
        '427',
        '428',
        '429',
        '432',
        '433',
        '434',
        '435',
        '436',
        '437',
        '438',
        '439',
        '500',
        '502',
        '503',
        '504',
        '505',
        '506',
        '507',
        '508',
        '509',
        '510',
        '511',
        '512',
        '513',
        '514',
        '515',
        '516',
        '520',
        '521',
        '522',
        '523',
        '524',
        '525',
        '526',
        '527',
        '528',
        '530',
        '540',
        '541',
        '542',
        '544',
        '545',
        '546',
        '551',
        '552',
        '553',
        '555',
        '556',
        '557',
        '558',
        '600',
        '602',
        '603',
        '604',
        '605',
        '606',
        '607',
        '608',
        '611',
        '612',
        '613',
        '614',
        '615',
        '615',
        '616',
        '621',
        '622',
        '623',
        '624',
        '625',
        '630',
        '631',
        '632',
        '633',
        '634',
        '635',
        '636',
        '637',
        '638',
        '640',
        '643',
        '646',
        '647',
        '648',
        '649',
        '651',
        '652',
        '653',
        '654',
        '655',
        '700',
        '701',
        '702',
        '704',
        '708',
        '709',
        '710',
        '711',
        '712',
        '713',
        '714',
        '715',
        '716',
        '717',
        '718',
        '719',
        '720',
        '720',
        '721',
        '722',
        '723',
        '724',
        '725',
        '726',
        '727',
        '730',
        '731',
        '732',
        '733',
        '734',
        '735',
        '736',
        '737',
        '741',
        '742',
        '743',
        '744',
        '745',
        '800',
        '801',
        '802',
        '803',
        '804',
        '805',
        '806',
        '807',
        '811',
        '812',
        '813',
        '814',
        '815',
        '817',
        '819',
        '820',
        '821',
        '822',
        '823',
        '824',
        '825',
        '826',
        '827',
        '828',
        '829',
        '830',
        '831',
        '832',
        '833',
        '842',
        '843',
        '844',
        '845',
        '846',
        '847',
        '848',
        '849',
        '851',
        '852',
        '880',
        '881',
        '882',
        '883',
        '884',
        '885',
        '890',
        '891',
        '892',
        '893',
        '894',
        '896',
        '900',
        '901',
        '902',
        '903',
        '904',
        '905',
        '906',
        '907',
        '908',
        '909',
        '911',
        '912',
        '913',
        '920',
        '921',
        '922',
        '923',
        '924',
        '925',
        '926',
        '927',
        '928',
        '929',
        '931',
        '932',
        '940',
        '941',
        '942',
        '943',
        '944',
        '945',
        '946',
        '947',
        '950',
        '951',
        '952',
        '953',
        '954',
        '955',
        '956',
        '957',
        '958',
        '959',
        '961',
        '962',
        '963',
        '964',
        '965',
        '966',
        '970',
        '971',
        '952',
        '972',
        '973',
        '974',
        '975',
        '976',
        '977',
        '978',
        '979',
        '981',
        '982',
        '983',
    ];
    public $allowPlusTwo;

    public function __construct($allowPlusTwo = true)
    {
        $this->allowPlusTwo = $allowPlusTwo;
    }

    /**
     * @inheritDoc
     */
    public function passes($attribute, $value): bool
    {
        $postalCode = Str::of($value)
            ->explode('-');

        if($postalCode->count() !== 2) {
            return false;
        }

        if(!in_array($postalCode->first(), $this->firstOctet)) {
            return false;
        }

        $lastElement = Str::of($postalCode->last());

        if($this->allowPlusTwo && ( $lastElement->length() === 2 || $lastElement->length() === 3) ) {
            return true;

        }

        if(!$this->allowPlusTwo && $lastElement->length() === 3) {
            return true;
        }

        return false;
    }

    /**
     * @inheritDoc
     */
    public function message(): string
    {
        return ':attribute does not contain a valid Taiwanese postal code';
    }
}