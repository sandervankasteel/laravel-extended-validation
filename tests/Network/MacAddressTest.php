<?php

use LaravelExtendedValidation\Rules\Network\MacAddress;

test('that we can successfully validate a MAC address with the default separator sign', function ($macAddress, $expectedOutput) {
    $sut = new MacAddress();

    expect(
        $sut->passes('some-attribute', $macAddress)
    )->toBe($expectedOutput);
})->with([
    ['7a:7e:53:39:d8:4e', true],
    ['7a:7e:53:39:d8', false],
    ['7a:7e:53:39:d8:4e:9f', false],
]);

test('test the testing suite throws an exception when a segment of the input is not a valid hexidecimal number', function () {
    $sut = new MacAddress();

    expect(
        $sut->passes('some-attribute', '7a:7h:53:39:d8:4e')
    )->toBe(false);
})->throwsIf(str_contains('8.', phpversion()), Exception::class);

test('that we can successfully validate a MAC address with our own separator sign', function ($macAddress, $expectedOutput) {
    $sut = new MacAddress('-');

    expect(
        $sut->passes('some-attribute', $macAddress)
    )->toBe($expectedOutput);
})->with([
    ['7a-7e-53-39-d8-4e', true],
    ['7a-7e-53-39-d8', false],
    ['7a-7e-53-39-d8-4e-9f', false],
]);

test('that the attribute is return in the error message', function () {
    $sut = new MacAddress();

    expect(
        $sut->message()
    )->toContain(':attribute');
});
