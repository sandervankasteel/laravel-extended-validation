<?php

use LaravelExtendedValidation\Rules\Locale\FR\Company\VatNumber;

test('that we can successfully validate VAT numbers', function ($vatNumber, $expectedOutput) {
    $sut = new VatNumber();

    expect(
        $sut->passes('some-attribute', $vatNumber)
    )->toBe($expectedOutput);
})->with([
    ['FR 96 552100554', true],
    ['FR96552100554', true],
    ['FR33855200507', true],
    ['FR32855200507', false],
    ['FR95552100554', false],
    ['FR3285520050', false],
]);

test('that we get the attribute back from the error message', function () {
    $sut = new VatNumber();
    expect(
        $sut->message()
    )->toContain(':attribute');
});
