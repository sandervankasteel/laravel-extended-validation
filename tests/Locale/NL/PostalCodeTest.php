<?php

use SandervanKasteel\LaravelExtendedValidation\Rules\Locale\NL\Address\PostalCode;

test('Test that a valid Dutch postalcode is considered correct', function () {
    $sut = new PostalCode();

    $this->assertTrue(
        $sut->passes('some-attribute', '1234AB')
    );
});

test('Test that a valid Dutch postalcode with a space in it is considered valid', function () {
    $sut = new PostalCode(true);

    $this->assertTrue(
        $sut->passes('attribute', '1234 AB')
    );
});

test('Test that a Dutch postalcode check fails if it contains a blacklisted postal code', function () {
    $sut = new PostalCode();

    $this->assertFalse(
        $sut->passes('some-attribute', '1234SA')
    );

    $this->assertFalse(
        $sut->passes('some-attribute', '1234SD')
    );

    $this->assertFalse(
        $sut->passes('some-attribute', '1234SS')
    );
});

test('Test that the Dutch postalcode numeric part fails, when it is below 999', function () {
    $sut = new PostalCode();

    $this->assertFalse(
        $sut->passes('some-attribute', '0998AB')
    );
});

test('Test that a Dutch postalcode must fail with 5 numbers', function () {
    $sut = new PostalCode();

    $this->assertFalse(
        $sut->passes('attribute', '12345AB')
    );
});

test('Test that a Dutch postalcode must fail with 3 letters', function () {
    $sut = new PostalCode();

    $this->assertFalse(
        $sut->passes('attribute', '1234ABC')
    );
});

test('Test that the Dutch postalcode check fails when it has completely non-sensical', function () {
    $sut = new PostalCode();

    $this->assertFalse(
        $sut->passes('attribute', '1A2B3C')
    );
});
