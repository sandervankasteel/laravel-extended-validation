<?php

use LaravelExtendedValidation\Rules\Color\RGB;

test('that we can successfully validate RGB codes', function ($rgbCode, $expectedResult) {
    $sut = new RGB();

    expect(
        $sut->passes('some-attribute', $rgbCode)
    )->toBe($expectedResult);
})->with([
    ['rgb(255,255,255)', true],
    ['rgb( 255, 255, 255)', true],
    ['RGB(255,255,255)', true],
    ['RgB(255,255,255)', true],
    ['abc(255,255,255)', false],
    ['rgb(256,256,256)', false],
    ['rgb(-1,-1,-1)', false],
    ['rgb(255,256,255)', false],
    ['rgba(255,255,255)', false],
    ['rgb(255,255)', false],
    ['rgb(255,255', false],
    ['rgb255,255,255', false],
    ['abc(2,2)', false],
    ['abc(255,255,255,2)', false],
]);

test('that the error message contains the attribute', function () {
    $sut = new RGB();

    expect(
        $sut->message()
    )->toContain(':attribute');
});
