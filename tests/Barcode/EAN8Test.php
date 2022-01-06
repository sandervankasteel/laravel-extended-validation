<?php

use LaravelExtendedValidation\Rules\Barcode\EAN8;

test('that we can successfully validate an EAN-8 Barcode', function ($barcode, $expectedResult) {
    $sut = new EAN8();

    expect(
        $sut->passes('some-attribute', $barcode)
    )->toBe($expectedResult);
})->with([
    ['73513537', true],
    ['20123451', true],
    ['12345678', false],
    ['1234567', false],
    ['123456789', false],
]);

test('that we get an attribute back from the error message', function () {
    $sut = new EAN8();

    expect(
        $sut->message()
    )->toContain(':attribute');
});
