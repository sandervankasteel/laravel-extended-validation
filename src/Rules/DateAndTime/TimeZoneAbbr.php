<?php

namespace LaravelExtendedValidation\Rules\DateAndTime;

use DateTimeZone;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class TimeZoneAbbr implements Rule
{
    /**
     * Based on this list: https://github.com/php/php-src/blob/master/ext/date/lib/timezonemap.h
     * @var string[]
     */
    public $acceptedTimezones = [
        'acdt',
        'acst',
        'addt',
        'adt',
        'aedt',
        'aest',
        'ahdt',
        'ahst',
        'akdt',
        'akst',
        'amt',
        'apt',
        'ast',
        'awdt',
        'awst',
        'awt',
        'bdst',
        'bdt',
        'bmt',
        'bst',
        'cast',
        'cat',
        'cddt',
        'cdt',
        'cemt',
        'cest',
        'cet',
        'cmt',
        'cpt',
        'cst',
        'cwt',
        'chst',
        'dmt',
        'eat',
        'eddt',
        'edt',
        'eest',
        'eet',
        'emt',
        'ept',
        'est',
        'ewt',
        'ffmt',
        'fmt',
        'gdt',
        'gmt',
        'gst',
        'hdt',
        'hkst',
        'hkt',
        'hmt',
        'hpt',
        'hst',
        'hwt',
        'iddt',
        'idt',
        'imt',
        'ist',
        'jdt',
        'jmt',
        'jst',
        'kdt',
        'kmt',
        'kst',
        'lst',
        'mddt',
        'mdst',
        'mdt',
        'mest',
        'met',
        'mmt',
        'mpt',
        'msd',
        'msk',
        'mst',
        'mwt',
        'nddt',
        'ndt',
        'npt',
        'nst',
        'nwt',
        'nzdt',
        'nzmt',
        'nzst',
        'pddt',
        'pdt',
        'pkst',
        'pkt',
        'plmt',
        'pmt',
        'ppmt',
        'ppt',
        'pst',
        'pwt',
        'qmt',
        'rmt',
        'sast',
        'sdmt',
        'sjmt',
        'smt',
        'sst',
        'tbmt',
        'tmt',
        'uct',
        'utc',
        'wast',
        'wat',
        'wemt',
        'west',
        'wet',
        'wib',
        'wita',
        'wit',
        'wmt',
        'yddt',
        'ydt',
        'ypt',
        'yst',
        'ywt',
    ];

    /**
     * @inheritDoc
     */
    public function passes($attribute, $value): bool
    {
        $timezone = Str::of($value)->lower();

        if (in_array((string) $timezone, $this->acceptedTimezones)) {
            return true;
        }

        try {
            new DateTimeZone($timezone);
        } catch (\Exception $e) {
            return false;
        }

        return true;
    }

    /**
     * @inheritDoc
     */
    public function message(): string
    {
        return ':attribute does not contain a valid timezone abbreviation';
    }
}
