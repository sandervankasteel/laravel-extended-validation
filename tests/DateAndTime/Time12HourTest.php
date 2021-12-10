<?php

use SandervanKasteel\LaravelExtendedValidation\Rules\DateAndTime\Time12Hour;

test('that we can succesfully validate a time in the 12 hour format without meridiem', function ($timeString, $expectedResult) {
    $sut = new Time12Hour();

    expect(
        $sut->passes('some-attribute', $timeString)
    )->toBe($expectedResult);
})->with([
    ['12:00', true],
    ['12:00:00', true],
    ['12:59:99', false],
]);
