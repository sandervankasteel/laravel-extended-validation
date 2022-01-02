<?php

use LaravelExtendedValidation\Rules\Locale\DE\Address\PostalCode;

test('that we can successfully validate a German postal code', function($postalCode, $expectedResult) {
    $sut = new PostalCode();

    expect(
        $sut->passes('some-attribute', $postalCode)
    )->toBe($expectedResult);

})->with([
    ['56626', true],
    ['01445', true],
    ['00100', false],
    ['05100', false],
    ['43100', false],
    ['62100', false]
]);

test('that we get the attribute back from the error message', function() {
    $sut = new PostalCode();

    expect(
        $sut->message()
    )->toContain(':attribute');
});