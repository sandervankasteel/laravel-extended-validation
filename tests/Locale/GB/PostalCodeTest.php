<?php

use LaravelExtendedValidation\Rules\Locale\GB\Address\PostalCode;

test('that we can successfully validate a postal code', function ($postalCode, $expectedOutput) {
    $sut = new PostalCode();

    expect(
        $sut->passes('some-attribute', $postalCode)
    )->toBe($expectedOutput);
})->with([
    ['EC1A 1BB', true],
    ['W1A 0AX', true],
    ['W1T 1FB', true],
    ['ASCN 1ZZ', false], // 'special case' postal code (Ascension Island)
]);

test('that we can successfully validate special cases postal codes', function ($postalCode, $expectedOutput) {
    $sut = new PostalCode(true);
    expect(
        $sut->passes('some-attribute', $postalCode)
    )->toBe($expectedOutput);
})->with([
    ['ASCN 1ZZ', true],
    ['BBND 1ZZ', true],
    ['BIQQ 1ZZ', true],
    ['FIQQ 1ZZ', true],
    ['GX11 1AA', true],
    ['PCRN 1ZZ', true],
    ['SIQQ 1ZZ', true],
    ['STHL 1ZZ', true],
    ['TDCU 1ZZ', true],
    ['TKCA 1ZZ', true],
]);

test('that the attribute is being returned in the error message', function () {
    $sut = new PostalCode();

    expect(
        $sut->message()
    )
        ->toContain(':attribute')
        ->toContain('Not including British Overseas Territories.');
});

test('that the error message mentions the British Overseas Territories', function () {
    $sut = new PostalCode(true);

    expect(
        $sut->message()
    )
        ->toContain(':attribute')
        ->toContain('(or British Overseas Territories)');
});
