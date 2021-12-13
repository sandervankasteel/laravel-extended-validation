<?php

use LaravelExtendedValidation\Rules\Network\IPv4;

test('that we can successfully validate non-private networks', function ($ipAddress, $expectedOuptut) {
    $sut = new IPv4();

    expect(
        $sut->passes('some-attribute', $ipAddress)
    )->toBe($expectedOuptut);
})->with([
    ['217.123.218.152', true],
    ['192.168.1.1', false],
    ['10.13.37.1', false],
]);

test('that we can successfully validate private networks', function ($ipAddress, $expectedOuptut) {
    $sut = new IPv4(true);

    expect(
        $sut->passes('some-attribute', $ipAddress)
    )->toBe($expectedOuptut);
})->with([
    ['217.123.218.152', true],
    ['192.168.1.1', true],
    ['10.13.37.1', true],
]);

test('that IP address with less then 4 octets are considered invalid', function ($ipAddress, $expectedOuptut) {
    $sut = new IPv4();

    expect(
        $sut->passes('some-attribute', $ipAddress)
    )->toBe($expectedOuptut);
})->with([
    ['217.123.218', false],
    ['192.168.1', false],
    ['10.13.37', false],
]);

test('that IP address with more then 5 octets are considered invalid', function ($ipAddress, $expectedOuptut) {
    $sut = new IPv4();

    expect(
        $sut->passes('some-attribute', $ipAddress)
    )->toBe($expectedOuptut);
})->with([
    ['217.123.218.152.5', false],
    ['192.168.1.1.5', false],
    ['10.13.37.1.5', false],
]);

test('that non-sensical IP addresses are considered invalid', function ($ipAddress) {
    $sut = new IPv4();

    expect(
        $sut->passes('some-attribute', $ipAddress)
    )->toBeFalse();
})->with([
    ['256.256.256.256'],
    ['350.66.44.33'],
]);

test('that the attribute is return in the error messsage', function () {
    $sut = new IPv4();

    expect(
        $sut->message()
    )->toContain(':attribute');
});
