<?php

use SandervanKasteel\LaravelExtendedValidation\Rules\DateAndTime\UnixTime;

test('that we can successfully validate a UNIX timestamp', function ($timestamp, $expected) {
    $sut = new UnixTime();

    expect(
        $sut->passes('some-attribute', $timestamp)
    )->toBe($expected);
})->with([
    [1639163310, true],
    [1, true],
    [2147483647, true], // 19 January 2038, limit of the 32 bit UNIX timestamp
]);

test('that we non numerical values are considered to be invalid', function ($timestamp, $expected) {
    $sut = new UnixTime();

    expect(
        $sut->passes('some-attribute', $timestamp)
    )->toBe($expected);
})->with([
    ['abcd12345', false],
    [[], false],
    [true, false],
]);

test('that we get the attribute back in the error message', function () {
    $sut = new UnixTime();

    expect(
        $sut->message()
    )->toContain(':attribute');
});
