<?php

use LaravelExtendedValidation\Rules\Locale\RU\Address\PostalCode;

test('that we can successfully validate a Russian postal code', function ($postalCode, $expectedOutput) {
    $sut = new PostalCode();

    expect(
        $sut->passes('some-attribute', $postalCode)
    )->toBe($expectedOutput);
})->with([
    ['191028', true],
    ['191123', true],
    ['191124', true],
    ['191015', true],
    ['191014', true],
    ['19101', false],
    ['1910145', false],
]);

test('that the attribute is returned in the error message', function () {
    $sut = new PostalCode();

    expect(
        $sut->message()
    )->toContain(':attribute');
});
