<?php

use LaravelExtendedValidation\Rules\Locale\IE\Address\PostalCode;

test('that we can successfully validate Irish postal codes', function ($postalCode, $expectedOutput) {
    $sut = new PostalCode();

    expect(
        $sut->passes('some-attribute', $postalCode)
    )->toBe($expectedOutput);
})->with([
    ['A65 F4E2', true],
    ['D6W F4E2', true],
    ['W23 F854', true],
    ['W23F84', false],
    ['W56 1234', true],
    ['W23F845E', false],
    ['W23 !854', false],
    ['B55 F4E2', false], // Disallowed letters
    ['G55 F4E2', false],
    ['I55 F4E2', false],
    ['J55 F4E2', false],
    ['L55 F4E2', false],
    ['M55 F4E2', false],
    ['O55 F4E2', false],
    ['Q55 F4E2', false],
    ['S55 F4E2', false],
    ['U55 F4E2', false],
    ['Z55 F4Z2', false],
]);

test('that the attribute is returned in the error message', function () {
    $sut = new PostalCode();

    expect(
        $sut->message()
    )->toContain(':attribute');
});
