<?php

use LaravelExtendedValidation\Rules\Color\RGBA;

test('that we can successfully validate RGB codes', function ($rgbCode, $expectedResult) {
    $sut = new RGBA();

    expect(
        $sut->passes('some-attribute', $rgbCode)
    )->toBe($expectedResult);
})->with([
    ['rgba(255,255,255,0.1)', true],
    ['rgba(1,1,1,0.1)', true],
    ['rgba(1, 1, 1, 0.1)', true],
    ['rgba( 255, 255, 255, 0.1)', true],
    ['RGBa(255,255,255, 0.1)', true],
    ['RgBa(255,255,255, 0.1)', true],
    ['rgba(255,255,255)', false],
    ['rgb(255,255,255)', false],
    ['abca(255,255,255, 0.2)', false],
    ['rgba(256,256,256, 0.2)', false],
    ['rgba(255,256,255, 0.2)', false],
    ['rgba(255,255)', false],
    ['rgba(255,255', false],
    ['rgba255,255,255,0.2', false],
    ['abca(2,2)', false],
    ['abca(255,255,255,0.2)', false],
]);

test('that the error message contains the attribute', function () {
    $sut = new RGBA();

    expect(
        $sut->message()
    )->toContain(':attribute');
});
