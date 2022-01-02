<?php

//
use LaravelExtendedValidation\Rules\Payment\Visa;

// Source for test numbers: https://www.windcave.com/support-merchant-frequently-asked-questions-testing-details

test('that we can successfully validate an Visa card number', function ($number, $expectedResult) {
    $sut = new Visa();

    expect(
        $sut->passes('some-attribute', $number)
    )->toBe($expectedResult);
})->with([
    ['4111 1111 1111 1111', true],
    ['4242 4242 4242 4242', true],
    ['4999 9999 9999 9103', true],
    ['4999 9999 9999 9202', true],
    ['4222 2222 222 22', true],
    ['4111 1111 1111 1119', false],
    ['4999 9999 9999 9108', false],
    ['4999 9999 9999 9109', false],
    ['5999 9999 9999 9109', false],
    ['5999 9999 9999 910', false],
    ['5999 9999 9999 91099', false],
]);

test('that the attribute is being returned in the error message', function () {
    $sut = new Visa();

    expect(
        $sut->message()
    )->toContain(':attribute');
});
