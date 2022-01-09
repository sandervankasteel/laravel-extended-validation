<?php

use LaravelExtendedValidation\Rules\Barcode\UPC_A;

test('that we can successfully validate an UPC(-A) barcode', function ($barcode, $expectedOutput) {
    $sut = new UPC_A();

    expect(
        $sut->passes('some-attribute', $barcode)
    )->toBe($expectedOutput);
})->with([
    ['012345678905', true],
    ['036000291452', true],
    ['042100005264', true],
    ['042100005265', false],
    ['04210000526', false],
    ['0421000052644', false],
]);

test('that we get an attribute back from the error message', function () {
    $sut = new UPC_A();

    expect(
        $sut->message()
    )->toContain(':attribute');
});
