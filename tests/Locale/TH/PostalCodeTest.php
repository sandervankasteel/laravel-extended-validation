<?php

use LaravelExtendedValidation\Rules\Locale\TH\Address\PostalCode;

test('we can successfully validate a Thai (TH) postal code', function ($postalCode, $expectedResult) {
    $sut = new PostalCode();

    expect(
        $sut->passes('some-attribute', $postalCode)
    )->toBe($expectedResult);
})->with([
    ['43120', true],
    ['20700', true],
    ['38123', true],
    ['49999', true],
    ['123', false],
    ['01230', false],
    ['123456', false],
    ['19000', false], // Falls out of the range of valid data
    ['28000', false], // Falls out of the range of valid data
]);


test('that the attribute is returned in the error message', function () {
    $sut = new PostalCode();

    expect(
        $sut->message()
    )->toContain(':attribute');
});
