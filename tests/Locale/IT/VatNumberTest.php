<?php

use LaravelExtendedValidation\Rules\Locale\IT\Company\VatNumber;

test('that we can successfully validate Italian VAT numbers', function ($vatNumber, $expectedOutput) {
    $sut = new VatNumber();

    expect(
        $sut->passes('some-attribute', $vatNumber)
    )->toBe($expectedOutput);
})->with([
    ['IT00632810164', true],
    ['IT0063281016', false],
    ['IT006328101644', false],
    ['NL00632810164', false],
]);

test('that we get the attribute back from the error message', function () {
    $sut = new VatNumber();

    expect(
        $sut->message()
    )->toContain(':attribute');
});
