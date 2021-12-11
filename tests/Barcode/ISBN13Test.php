<?php

use LaravelExtendedValidation\Rules\Barcode\ISBN13;

test('That we can successfully validate ', function ($isbn, $expectedValue) {
    $sut = new ISBN13();

    expect(
        $sut->passes('some-attribute', $isbn)
    )->toBe($expectedValue);
})->with([
    ['978-0-306-40615-7', true],
    ['978_0_306_40615_7', true],
    ['9789044637311', true],
    ['978-0-306-40615-8', false],
    ['0306406158', false],
    ['97803064061589', false],
]);

test('that the attribute is being returned in the error message', function () {
    $sut = new ISBN13();

    expect(
        $sut->message()
    )->toContain(':attribute');
});
