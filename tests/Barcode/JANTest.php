<?php

use LaravelExtendedValidation\Rules\Barcode\JAN;

test('that we can successfully validate an JAN Barcode', function ($barcode, $expectedResult) {
    $sut = new JAN();

    expect(
        $sut->passes('some-attribute', $barcode)
    )->toBe($expectedResult);
})->with([
    ['4988009045368', true],
    ['4988009031897', true],
    ['4988010023133', true],
    ['4514392200031', true],
    ['8809696003417', false],
    ['4988009045367', false],
    ['498800904536', false],
    ['49880090453689', false],
]);

test('that we get an attribute back from the error message', function () {
    $sut = new JAN();

    expect(
        $sut->message()
    )->toContain(':attribute');
});