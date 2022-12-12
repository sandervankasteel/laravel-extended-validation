<?php

use LaravelExtendedValidation\Rules\Locale\GB\Company\VatNumber;

test('that we can successfully validate VAT numbers', function ($vatNumber, $expectedOutput) {
    $sut = new VatNumber();

    expect(
        $sut->passes('some-attribute', $vatNumber)
    )->toBe($expectedOutput);
})->with([
    ['GB123456789', true],
    ['GB123456789012', true],
    ['GB1234567890', false],
    ['GB12345678', false],
    ['FR3285520050', false],
]);

test('that we get the attribute back from the error message', function () {
    $sut = new VatNumber();
    expect(
        $sut->message()
    )->toContain(':attribute');
});
