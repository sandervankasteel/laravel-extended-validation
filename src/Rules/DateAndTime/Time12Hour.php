<?php

namespace LaravelExtendedValidation\Rules\DateAndTime;

use DateTime;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Str;

class Time12Hour implements Rule
{
    /**
     * @var string
     */
    private $timeSeparator;

    /**
     * @var bool
     */
    private $requiresMeridiem;

    public function __construct(bool $requiresMeridiem = false, string $timeSeparator = ':')
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

            if ($meridiem->length() === 0) {
                return false;
            }
        }

        $values = Str::of($value)
            ->replace($meridiem, '')
            ->replace(' ', '')
            ->explode($this->timeSeparator);

        $expectedFormat = ($values->count() === 2) ? 'h:ia' : 'h:i:sa';

        $parsedDate = DateTime::createFromFormat(
            $expectedFormat,
            $values->join(':').$meridiem
        );

        return $parsedDate !== false &&
            Str::of($parsedDate->format($expectedFormat))
                ->matchAll('/'.$values->join('|').'/')
                ->count() === $values->count();
    }

    /**
     * @inheritDoc
     */
    public function message(): string
    {
        $message = 'The :attribute does not contain a valid time. It needs be in the following format: '
            .collect(['12', '00', '00'])->join($this->timeSeparator);

        if ($this->requiresMeridiem) {
            return $message.' AM';
        }

        return $message;
    }
}
