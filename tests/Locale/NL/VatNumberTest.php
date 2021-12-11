<?php

use LaravelExtendedValidation\Rules\Locale\NL\Company\VatNumber;

test('that we can successfully validate NL VAT numbers', function ($vatNumber, $expectedOutput) {
    $sut = new VatNumber();

    expect(
        $sut->passes('some-attribute', $vatNumber)
    )->toBe($expectedOutput);
})->with([
    ['NL123456782B01', true],
    ['NL123456782B1', false],
    ['BE123456782B01', false],
    ['NL123456782', false],
]);

test('that we get the attribute back from the error message', function () {
    $sut = new VatNumber();
    expect(
        $sut->message()
    )->toContain(':attribute');
});
