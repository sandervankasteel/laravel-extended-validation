<?php

namespace LaravelExtendedValidation\Rules\DateAndTime;

use DateTime;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class Time24Hour implements Rule
{
    private $timeSeparator;

    public function __construct($timeSeparator = ':')
    {
        $this->timeSeparator = $timeSeparator;
    }

    public function passes($attribute, $value): bool
    {
        $values = Str::of($value)
            ->replace(' ', '')
            ->explode($this->timeSeparator);

        $expectedFormat = ($values->count() === 2) ? 'H:i' : 'H:i:s';

        $parsedDate = DateTime::createFromFormat(
            $expectedFormat,
            $values->join(':')
        );

        return $parsedDate !== false &&
            Str::of($parsedDate->format($expectedFormat))
                ->matchAll('/'.$values->join('|').'/')
                ->count() === $values->count();
    }

    public function message(): string
    {
        return 'The :attribute does not contain a valid time. It needs be in the following format: '
            .collect(['20', '00', '00'])
                ->join($this->timeSeparator);
    }
}
