<?php

use LaravelExtendedValidation\Rules\Locale\SE\Address\PostalCode;

test('that we can successfully validate a Swedish postal code', function ($postalCode, $expectedOutput) {
    $sut = new PostalCode();

    expect(
        $sut->passes('some-attribute', $postalCode)
    )->toBe($expectedOutput);
})->with([
    ['343 81', true],
    ['412 81', true],
    ['34381', false],
    ['343 812', false],
    ['343 8', false],
]);

test('that the attribute is returned in the error message', function () {
    $sut = new PostalCode();

    expect(
        $sut->message()
    )->toContain(':attribute');
});
