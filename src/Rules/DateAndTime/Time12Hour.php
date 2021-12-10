<?php

namespace SandervanKasteel\LaravelExtendedValidation\Rules\DateAndTime;

use DateTime;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class Time12Hour implements Rule
{
    private $timeSeparator;

    private $requiresMeridiem;

    public function __construct($requiresMeridiem = false, $timeSeparator = ':')
    {
        $this->timeSeparator = $timeSeparator;

        $this->requiresMeridiem = $requiresMeridiem;
    }

    /**
     * @inheritDoc
     */
    public function passes($attribute, $value): bool
    {
        $meridiem = 'AM';

        if ($this->requiresMeridiem) {
            $meridiem = Str::of($value)
                ->upper()
                ->match('[AM|PM]');

            if ($meridiem === '') {
                return false;
            }
        }

        $values = Str::of($value)
            ->explode($this->timeSeparator);

        $expectedFormat = ($values->count() === 2) ? 'h:ia' : 'h:i:sa';

        return DateTime::createFromFormat(
            $expectedFormat,
            $values->join(':').$meridiem
        ) !== false;
    }

    /**
     * @inheritDoc
     */
    public function message()
    {
        // TODO: Implement message() method.
    }
}
