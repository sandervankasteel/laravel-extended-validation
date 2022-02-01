<?php

use LaravelExtendedValidation\Rules\Locale\DK\Address\PostalCode;

test('that we can successfully validate a Danish Postal code', function ($postalCode, $expectedOutput) {
    $sut = new PostalCode();

    expect(
        $sut->passes('some-attribute', $postalCode)
    )->toBe($expectedOutput);
})->with([
    ['8210', true],
    ['7000', true],
    ['69420', false],
    ['123', false],
]);

test('that the attribute is returned in the error message', function () {
    $sut = new PostalCode();

    expect(
        $sut->message()
    )->toContain(':attribute');
});
