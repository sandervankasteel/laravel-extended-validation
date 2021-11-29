<?php

use SandervanKasteel\LaravelExtendedValidation\Rules\Locale\NL\Person\SocialSecurityNumber;

test('that "111222333" is considered a correct social security number', function () {
    $sut = new SocialSecurityNumber();
    $this->assertTrue(
        $sut->passes('some-attribute', '111222333')
    );
});

test('that "123456782" is considered a correct social security number', function () {
    $sut = new SocialSecurityNumber();
    $this->assertTrue(
        $sut->passes('some-attribute', '123456782')
    );
});

test('that "111222334" is considered an incorrect social security number', function () {
    $sut = new SocialSecurityNumber();
    $this->assertFalse(
        $sut->passes('some-attribute', '111222334')
    );
});

test('that a number shorter then 9 numbers is considered invalid', function () {
    $sut = new SocialSecurityNumber();
    $this->assertFalse(
        $sut->passes('some-attribute', '1234')
    );
});

test('that a number longer then 9 numbers is considered invalid', function () {
    $sut = new SocialSecurityNumber();
    $this->assertFalse(
        $sut->passes('some-attribute', '1234567890')
    );
});
