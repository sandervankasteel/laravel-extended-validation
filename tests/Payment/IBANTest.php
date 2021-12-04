<?php

use SandervanKasteel\LaravelExtendedValidation\Rules\Payment\IBAN;

test('that we can successfully validate an IBAN number', function ($ibanNumber, $valid) {
    $sut = new IBAN();

    expect(
        $sut->passes('some-attribute', $ibanNumber)
    )->toBe($valid);

})->with([
    [ 'GB82 WEST 1234 5698 7654 32', true ],
    [ 'NL69INGB0123456789', true ],
    [ 'NL32RABO1234567890', false ],
]);

test('that the attribute is being returned in the error message', function () {
    $sut = new IBAN();
    $sut->passes('attr1', 'abcd1234');

    expect(
        $sut->message()
    )->toContain(':attribute');
});

