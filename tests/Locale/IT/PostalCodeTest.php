<?php

use LaravelExtendedValidation\Rules\Locale\IT\Address\PostalCode;

test('that we can successfully validate an Italian postal code', function ($postalCode, $expectedResult) {
    $sut = new PostalCode();

    expect(
        $sut->passes('some-attribute', $postalCode)
    )->toBe($expectedResult);
})->with([
    ['00010', true],
    ['09170', true],
    ['20099', true],
    ['001230', false],
    ['0010', false],
    ['00120', false], // Vatican City
    ['47890', false], // San Marino
]);

test('that we can successfully validate a Vatican postal code', function ($postalCode, $expectedResult) {
    $sut = new PostalCode(true);

    expect(
        $sut->passes('some-attribute', $postalCode)
    )->toBe($expectedResult);
})->with([
    ['00120', true],
    ['20099', true],
    ['47890', false], // San Marino
]);

test('that we can successfully validate a San Marino postal code', function ($postalCode, $expectedResult) {
    $sut = new PostalCode(false, true);

    expect(
        $sut->passes('some-attribute', $postalCode)
    )->toBe($expectedResult);
})->with([
    ['47890', true],
    ['47891', true],
    ['20099', true],
    ['00120', false], // Vatican City
]);

test('that the attribute is returned in the error message', function () {
    $sut = new PostalCode();

    expect(
        $sut->message()
    )->toContain(':attribute');
});
