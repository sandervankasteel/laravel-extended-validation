<?php

use SandervanKasteel\LaravelExtendedValidation\Rules\DateAndTime\Time24Hour;

test('that we can succesfully validate a time in the 24-hour format', function ($timeString, $expectedResult) {
    $sut = new Time24Hour();

    expect(
        $sut->passes('some-attribute', $timeString)
    )->toBe($expectedResult);
})->with([
    ['12:00', true],
    ['12:00:00', true],
    ['23:59:99', false],
]);



test('that we can succesfully validate a time in the 24-hours format with a custom separator', function ($timeString, $expectedResult) {
    $sut = new Time24Hour('*');

    expect(
        $sut->passes('some-attribute', $timeString)
    )->toBe($expectedResult);
})->with([
    ['12*00', true],
    ['12*00*00', true],
    ['12*59*99', false],
]);


test('that the attribute is being returned in the error message', function() {
    $sut = new Time24Hour();

    expect(
        $sut->message()
    )->toContain(':attribute');
});

test('that an example time is being returned', function() {
    $sut = new Time24Hour();

    expect(
        $sut->message()
    )->toContain('20:00:00');
});

test('that the a custom timeseparator is being returned in the error message', function() {
    $sut = new Time24Hour('*');

    expect(
        $sut->message()
    )->toContain('20*00*00');
});