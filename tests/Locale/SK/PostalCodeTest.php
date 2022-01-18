<?php

use LaravelExtendedValidation\Rules\Locale\SK\Address\PostalCode;

test('we can successfully validate a South Korean (ROK) postal code', function ($postalCode, $expectedResult) {
    $sut = new PostalCode();

    expect(
        $sut->passes('some-attribute', $postalCode)
    )->toBe($expectedResult);
})->with([
    ['01000', true],
    ['43040', true],
    ['63600', true],
    ['0100', false],
    ['010009', false],
    ['64600', false],
]);

test('that the attribute is returned in the error message', function () {
    $sut = new PostalCode();

    expect(
        $sut->message()
    )->toContain(':attribute');
});
