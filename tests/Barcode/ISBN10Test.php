<?php

use LaravelExtendedValidation\Rules\Barcode\ISBN10;

test('that we can successfully validate an ISBN-10 number', function ($isbn, $expectedValue) {
    $sut = new ISBN10();

    expect(
        $sut->passes('some-attribute', $isbn)
    )->toBe($expectedValue);
})->with([
    ['0-306-40615-2', true],
    ['0_306_40615_ 2', true],
    ['0 306 40615 2', true],
    ['0306406152', true],
    ['0306406153', false],
    ['0306406153123', false],
    ['030640615', false],
]);

test('that the attribute is being returned in the error message', function () {
    $sut = new ISBN10();
    expect(
       $sut->message()
   )->toContain(':attribute');
});
