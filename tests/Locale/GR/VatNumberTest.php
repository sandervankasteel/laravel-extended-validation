<?php

use LaravelExtendedValidation\Rules\Locale\GR\Company\VatNumber;

test('that we can successfully validate Greek VAT numbers', function ($vatNumber, $expectedOutput) {
    $sut = new VatNumber();

    expect(
        $sut->passes('some-attribute', $vatNumber)
    )->toBe($expectedOutput);
})->with([
    ['EL123456789', true],
    ['EL456789123', true],
    ['GH456789123', false],
    ['EL45678912', false],
    ['EL4567891235', false],
]);

test('that we get the attribute back from the error message', function () {
    $sut = new VatNumber();

    expect(
        $sut->message()
    )->toContain(':attribute');
});
