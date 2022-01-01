<?php

use LaravelExtendedValidation\Rules\Locale\BE\Company\VatNumber;

test('that we can successfully validate VAT numbers', function ($vatNumber, $expectedOutput) {
    $sut = new VatNumber();

    expect(
        $sut->passes('some-attribute', $vatNumber)
    )->toBe($expectedOutput);
})->with([
    ['BE0809.387.596', true],
    ['BE0809387596', true],
    ['BE0418905287', true],
    ['BE0999999923', false],
    ['BE099999923', false],
    ['NL099999923', false],
]);

test('that we get the attribute back from the error message', function () {
    $sut = new VatNumber();
    expect(
        $sut->message()
    )->toContain(':attribute');
});
