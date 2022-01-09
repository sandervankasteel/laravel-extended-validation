<?php

use LaravelExtendedValidation\Rules\Barcode\ASIN;

test('that we can successfully validate an ASIN number', function ($asin, $expectedOutput) {
    $sut = new ASIN();

    expect(
        $sut->passes('some-attribute', $asin)
    )->toBe($expectedOutput);
})->with([
    ['B015OW3P1O', true],
    ['B07W7ML34V', true],
    ['B08XY388HX', true],
    ['b015Ow3P13', true],
    ['B015OW3P146', false],
    ['B015OW3P', false],
]);

test('that the attribute is being returned in the error message', function () {
    $sut = new ASIN();
    expect(
        $sut->message()
    )->toContain(':attribute');
});
