<?php

use LaravelExtendedValidation\Rules\Locale\TW\Address\PostalCode;

test('we can successfully validate a Taiwanese (TW) postal code with 3+2 validation enabled', function ($postalCode, $expectedResult) {
    $sut = new PostalCode();

    expect(
        $sut->passes('some-attribute', $postalCode)
    )->toBe($expectedResult);
})->with([
    ['300-096', true],
    ['300-75', true],
    ['741-44', true],
    ['107-44', false], // Falls out of the range of valid data
    ['101-123', false], // Falls out of the range of valid data
    ['109-123', false], // Falls out of the range of valid data
    ['113-123', false], // Falls out of the range of valid data
    ['117-123', false], // Falls out of the range of valid data
    ['309-123', false], // Falls out of the range of valid data
    ['322-123', false], // Falls out of the range of valid data
    ['543-123', false], // Falls out of the range of valid data
    ['554-123', false], // Falls out of the range of valid data
    ['703-123', false], // Falls out of the range of valid data
    ['818-123', false], // Falls out of the range of valid data
    ['741', false], // Invalid data
]);

test('we can successfully validate a Taiwanese (TW) postal code with only accepting 3+3 postal codes', function ($postalCode, $expectedResult) {
    $sut = new PostalCode(false);

    expect(
        $sut->passes('some-attribute', $postalCode)
    )->toBe($expectedResult);
})->with([
    ['300-096', true],
    ['300-196', true],
    ['300-75', false],
    ['741-44', false],
    ['107-44', false], // Falls out of the range of valid data
    ['101-123', false], // Falls out of the range of valid data
    ['109-123', false], // Falls out of the range of valid data
    ['113-123', false], // Falls out of the range of valid data
    ['117-123', false], // Falls out of the range of valid data
    ['309-123', false], // Falls out of the range of valid data
    ['322-123', false], // Falls out of the range of valid data
    ['543-123', false], // Falls out of the range of valid data
    ['554-123', false], // Falls out of the range of valid data
    ['703-123', false], // Falls out of the range of valid data
    ['818-123', false], // Falls out of the range of valid data
    ['741', false], // Invalid data
]);

test('that the attribute is returned in the error message', function () {
    $sut = new PostalCode();

    expect(
        $sut->message()
    )->toContain(':attribute');
});
