<?php

use LaravelExtendedValidation\Rules\Barcode\UPC_E;

test('that we can successfully validate an UPC(-A) barcode', function ($barcode, $expectedOutput) {
    $sut = new UPC_E();

    expect(
        $sut->passes('some-attribute', $barcode)
    )->toBe($expectedOutput);
})->with([
    ['01234565', true],
    ['00223393', true],
    ['17123457', true],
    ['27123457', false],
    ['0123456', false],
    ['012345657', false],
]);

test('that we get an attribute back from the error message', function () {
    $sut = new UPC_E();

    expect(
        $sut->message()
    )->toContain(':attribute');
});
