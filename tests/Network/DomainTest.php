<?php

use LaravelExtendedValidation\Rules\Network\Domain;

test('that we can successfully validate domains', function ($domain, $expectedOutput) {
    $sut = new Domain();

    expect(
        $sut->passes('some-attribute', $domain)
    )->toBe($expectedOutput);
})->with([
    ['domain.tld', true],
    ['subdomain.domain.tld', true],
    ['airkoryo.com.kp', true],
    ['something.co.uk', true],
    ['xn--c6h.com', true], // ♡.com
    ['g.co', true],
    ['notld', false],
    ['test.t.t.c', false],
    ['-domain.tld', false],
    ['domain.tld-', false],
]);

test('that the attribute is returned in the error message', function () {
    $sut = new Domain();

    expect(
        $sut->message()
    )->toContain(':attribute');
});
