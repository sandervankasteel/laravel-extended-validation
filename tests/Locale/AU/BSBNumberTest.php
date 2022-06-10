<?php

use LaravelExtendedValidation\Rules\Locale\AU\Payment\BSBNumber;

test('that we can successfully validate BSB numbers', function ($vatNumber, $expectedOutput) {
    $sut = new BSBNumber();

    expect(
        $sut->passes('some-attribute', $vatNumber)
    )->toBe($expectedOutput);
})->with([
    ['942-208', true],
    ['942-207', true],
    ['942-206', true],
    ['942208', true],
    ['942207', true],
    ['942206', true],
    ['1942-208', false],
    ['1942208', false],
]);

test('that we get the attribute back from the error message', function () {
    $sut = new BSBNumber();
    expect(
        $sut->message()
    )->toContain(':attribute');
});
