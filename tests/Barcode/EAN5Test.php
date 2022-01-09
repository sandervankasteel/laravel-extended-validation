<?php

use LaravelExtendedValidation\Rules\Barcode\EAN5;

test('that we can successfully validate an EAN-5 barcode', function ($barcode, $expectedOutput) {
    $sut = new EAN5();
    expect(
        $sut->passes('some-attribute', $barcode)
    )->toBe($expectedOutput);
})->with([
    ['52495', true],
    ['54495', true],
    ['05415', true],
    ['0123', false],
    ['012345', false],
]);

test('that we get an attribute back from the error message', function () {
    $sut = new EAN5();

    expect(
        $sut->message()
    )->toContain(':attribute');
});
