<?php

use LaravelExtendedValidation\Rules\Locale\SE\Company\VatNumber;

test('that we can successfully validate a Swedish VAT number', function ($vatNumber, $expectedResult) {
    $sut = new VatNumber();

    expect(
        $sut->passes('some-attribute', $vatNumber)
    )->toBe($expectedResult);
})->with([
    ['SE5560362138', true],
    ['SE5560362128', true],
    ['SE556036213', false],
    ['SE55603621323', false],
    ['SN5560362128', false],
]);

test('that we get the attribute back from the error message', function () {
    $sut = new VatNumber();

    expect(
        $sut->message()
    )->toContain(':attribute');
});
