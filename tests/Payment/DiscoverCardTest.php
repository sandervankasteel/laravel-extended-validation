<?php

use LaravelExtendedValidation\Rules\Payment\DiscoverCard;

test('that we can successfully validate a Discover Card', function ($creditCardNumber, $expectedOutput) {
    $sut = new DiscoverCard();

    expect(
        $sut->passes('some-attribute', $creditCardNumber)
    )->toBe($expectedOutput);
})->with([
    ['6011601160116611', true],
    ['6011-6011-6011-6611', true],
    ['6011 6011 6011 6611', true],
    ['6445 6445 6445 6445', true],
    ['36000000000000', false],
]);

test('that the attribute is being returned in the error message', function () {
    $sut = new DiscoverCard();

    expect(
        $sut->message()
    )->toContain(':attribute');
});
