<?php

use LaravelExtendedValidation\Rules\Locale\PT\Address\PostalCode;

test('that we can succesfully validate a Portugese postal code', function ($postalCode, $expectedOutput) {
    $sut = new PostalCode();

    expect(
        $sut->passes('some-attribute', $postalCode)
    )->toBe($expectedOutput);
})->with([
    ['1234', true],
    ['2050', true],
    ['8200', true],
    ['abcd', false],
    ['2b45', false],
    ['2b4557', false],
    ['45572', false],
]);

test('that the attribute is returned in the error message', function () {
    $sut = new PostalCode();

    expect(
        $sut->message()
    )->toContain(':attribute');
});
