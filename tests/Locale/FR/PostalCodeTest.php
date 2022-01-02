<?php

use LaravelExtendedValidation\Rules\Locale\FR\Address\PostalCode;

test('that we can successfully validate a French postal code', function ($postalCode, $expectedResult) {
    $sut = new PostalCode();

    expect(
        $sut->passes('some-attribute', $postalCode)
    )->toBe($expectedResult);
})->with([
    ['64205', true],
    ['64200', true],
    ['00100', true], // Military
    ['98000', false], // Monaco
    ['96000', false],
    ['1234', false],
    ['123456', false],
]);

test('that we can successfully validate an Monacan postal code', function ($postalCode, $expectedResult) {
    $sut = new PostalCode(true);

    expect(
        $sut->passes('some-attribute', $postalCode)
    )->toBe($expectedResult);
})->with([
    ['98000', true],
]);

test('that we get the attribute back from the error message', function () {
    $sut = new PostalCode();

    expect(
        $sut->message()
    )->toContain(':attribute');
});
