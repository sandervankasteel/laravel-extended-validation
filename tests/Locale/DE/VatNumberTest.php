<?php

use LaravelExtendedValidation\Rules\Locale\DE\Company\VatNumber;

test('that we can successfully validate VAT numbers', function ($vatNumber, $expectedOutput) {
    $sut = new VatNumber();

    expect(
        $sut->passes('some-attribute', $vatNumber)
    )->toBe($expectedOutput);
})->with([
    ['DE999999999', true],
    ['DE 999999999', true],
    ['de999999999', true],
    ['NL999999999', false],
]);

test('that we get the attribute back from the error message', function () {
    $sut = new VatNumber();
    expect(
        $sut->message()
    )->toContain(':attribute');
});
