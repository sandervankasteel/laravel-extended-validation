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

test('that we can succesfully validate a time in the 12 hour format with AM meridiem', function ($timeString, $expectedResult) {
    $sut = new Time12Hour(true);

    expect(
        $sut->passes('some-attribute', $timeString)
    )->toBe($expectedResult);
})->with([
    ['12:00 AM', true],
    ['12:00:00 AM', true],
    ['12:59:99 AM', false],
]);

test('that we can succesfully validate a time in the 12 hour format with PM meridiem', function ($timeString, $expectedResult) {
    $sut = new Time12Hour(true);

    expect(
        $sut->passes('some-attribute', $timeString)
    )->toBe($expectedResult);
})->with([
    ['12:00 PM', true],
    ['12:00:00 PM', true],
    ['12:59:99 PM', false],
]);

test('that we can validate a time in the 12 hour format with an AM meridiem AND a custom seperator', function ($timeString, $expectedResult) {
    $sut = new Time12Hour(true, '-');

    expect(
        $sut->passes('some-attribute', $timeString)
    )->toBe($expectedResult);
})->with([
    ['12-00 AM', true],
    ['12-00-00 AM', true],
    ['12-59-99 AM', false],
]);

test('that we can we can not validate a time in the 12 hour format with nonsensical meridiem', function ($timeString, $expectedResult) {
    $sut = new Time12Hour(true);

    expect(
        $sut->passes('some-attribute', $timeString)
    )->toBe($expectedResult);
})->with([
    ['12:00 XM', false],
    ['12:00:00 XM', false],
    ['12:59:99 XM', false],
]);

test('that the attribute is being returned in the error message', function () {
    $sut = new Time12Hour();

    expect(
        $sut->message()
    )->toContain(':attribute');
});

test('that an example time is being returned', function () {
    $sut = new Time12Hour(true);

    expect(
        $sut->message()
    )->toContain('12:00:00');
});

test('that the meridian is being returned in the error message when the meridiem is required', function () {
    $sut = new Time12Hour(true);

    expect(
        $sut->message()
    )->toContain('AM');
});

test('that the a custom timeseparator is being returned in the error message', function () {
    $sut = new Time12Hour(true, '*');

    expect(
        $sut->message()
    )->toContain('12*00*00 AM');
});
