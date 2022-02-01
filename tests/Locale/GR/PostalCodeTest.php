<?php

use LaravelExtendedValidation\Rules\Locale\GR\Address\PostalCode;

test('that we can successfully validate a Greek postal code', function ($postalCode, $expectedOutput) {
    $sut = new PostalCode();

    expect(
        $sut->passes('some-attribute', $postalCode)
    )->toBe($expectedOutput);
})->with([
    ['49131', true],
    ['85300', true],
]);

test('that the attribute is returned in the error message', function () {
    $sut = new PostalCode();

    expect(
        $sut->message()
    )->toContain(':attribute');
});
