<?php

use LaravelExtendedValidation\Rules\Network\IPv6;

test('that we can validate an IPv6 address', function ($ipAddress, $expectedOutut) {
    $sut = new IPv6();

    expect(
        $sut->passes('some-attribute', $ipAddress)
    )->toBe($expectedOutut);

})->with([
    [ '2001:0db8:85a3:0000:1319:8a2e:0370:7344', true ],
    [ '2001:db8::1428:57ab' , true],
    [ '2001:db8:::::1428:57ab', true],
    ['::1', true],
    [ '2001:db8::1428:57zy' , false],
]);

test('that the attribute is return in the error message', function() {
    $sut = new IPv6();
    expect(
        $sut->message()
    )->toContain(':attribute');
});