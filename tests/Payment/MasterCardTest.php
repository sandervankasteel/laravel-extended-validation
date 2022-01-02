<?php

//
use LaravelExtendedValidation\Rules\Payment\MasterCard;

// Source for test numbers: https://www.windcave.com/support-merchant-frequently-asked-questions-testing-details

test('that we can successfully validate an MasterCard card number', function ($number, $expectedResult) {
    $sut = new MasterCard();

    expect(
        $sut->passes('some-attribute', $number)
    )->toBe($expectedResult);
})->with([
    ['5431 1111 1111 1111', true],
    ['5123 4558 0630 8521', true],
    ['2223 0000 1000 0005', true],
    ['5431 1111 1111 1228', true],
    ['5999 9999 9999 9108', false],
]);

test('that the attribute is being returned in the error message', function () {
    $sut = new MasterCard();

    expect(
        $sut->message()
    )->toContain(':attribute');
});
