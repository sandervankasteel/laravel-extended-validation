<?php

use LaravelExtendedValidation\Rules\Locale\LU\Address\PostalCode;

test('that we can successfully validate a Luxembourg postal code', function ($postalCode, $expectedOutput) {
    $sut = new PostalCode();

    expect(
        $sut->passes('some-attribute', $postalCode)
    )->toBe($expectedOutput);
})->with([
    ['1234', true],
    ['9999', true],
    ['12345', false],
    ['1235ab', false],
]);

test('that the attribute is returned in the error message', function () {
    $sut = new PostalCode();

    expect(
        $sut->message()
    )->toContain(':attribute');
});
