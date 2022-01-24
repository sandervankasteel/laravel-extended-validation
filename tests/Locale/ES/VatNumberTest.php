<?php

use LaravelExtendedValidation\Rules\Locale\ES\Company\VatNumber;

test('that we can successfully validate Spanish company VAT numbers', function ($vatNumber, $expectedOutput) {
    $sut = new VatNumber();

    expect(
        $sut->passes('some-attribute', $vatNumber)
    )->toBe($expectedOutput);
})->with([
    ['ESB86261823', true],
    ['esb86261823', true],
    ['ESB862618233', false],
    ['ESB8626182', false],
    ['NLB86261823', false],
]);

test('that we get the attribute back from the error message', function () {
    $sut = new VatNumber();

    expect(
        $sut->message()
    )->toContain(':attribute');
});
