<?php

use LaravelExtendedValidation\Rules\Barcode\EAN13;

test('that we can successfully validate an EAN-13 Barcode', function ($barcode, $expectedResult) {
    $sut = new EAN13();

    expect(
        $sut->passes('some-attribute', $barcode)
    )->toBe($expectedResult);
})->with([
    ['4006381333931', true],
    ['4988009045368', true],
    ['8809696003416', true],
    ['8809696003417', false],
    ['400638133393', false],
    ['40063813339311', false],
]);

test('that we get an attribute back from the error message', function () {
    $sut = new EAN13();

    expect(
        $sut->message()
    )->toContain(':attribute');
});
