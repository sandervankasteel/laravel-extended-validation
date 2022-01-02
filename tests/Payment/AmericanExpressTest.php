<?php

use LaravelExtendedValidation\Rules\Payment\AmericanExpress;

// Source for test numbers: https://www.windcave.com/support-merchant-frequently-asked-questions-testing-details

test('that we can successfully validate an American Express card number', function ($number, $expectedResult) {
    $sut = new AmericanExpress();

    expect(
        $sut->passes('some-attribute', $number)
    )->toBe($expectedResult);
})->with([
    ['3774 0011 1111 115', true],
    ['371583160664484', true],
    ['371449635398431', true],
    ['3711 1111 1111 114', true],
    ['3700 0000 0100 018', true],
    ['3760 0000 0000 006', true],
    ['371234806987034', true],
    ['343434343434343', true],
    ['353434343434343', false],
    ['375987654321002', false],
    ['37598765432101', false],
    ['3759876543210001', false],
]);

test('that the attribute is being returned in the error message', function () {
    $sut = new AmericanExpress();

    expect(
        $sut->message()
    )->toContain(':attribute');
});
