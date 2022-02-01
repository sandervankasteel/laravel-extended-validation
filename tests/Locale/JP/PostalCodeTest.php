<?php

use LaravelExtendedValidation\Rules\Locale\JP\Address\PostalCode;

test('that we can successfully validate a Japanese postalcode', function ($postalCode, $expectedOutput) {
    $sut = new PostalCode();

    expect(
        $sut->passes('some-attribute', $postalCode)
    )->toBe($expectedOutput);
})->with([
    ['183-0016', true],
    ['259-0147', true],
    ['2590147', false],
]);

test('that the attribute is returned in the error message', function () {
    $sut = new PostalCode();

    expect(
        $sut->message()
    )->toContain(':attribute');
});
