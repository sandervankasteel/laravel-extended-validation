<?php

use LaravelExtendedValidation\Rules\Locale\LU\Company\VatNumber;

test('that we can successfully validate VAT numbers', function ($vatNumber, $expectedOutput) {
    $sut = new VatNumber();

    expect(
        $sut->passes('some-attribute', $vatNumber)
    )->toBe($expectedOutput);
})->with([
    ['LU15843111', true],
    ['LU17221904', true],
    ['LU15843112', false],
    ['123456789', false],
    ['LU12345678', false],
]);

test('that we get the attribute back from the error message', function () {
    $sut = new VatNumber();
    expect(
        $sut->message()
    )->toContain(':attribute');
});
