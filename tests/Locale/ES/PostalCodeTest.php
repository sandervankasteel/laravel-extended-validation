<?php

use LaravelExtendedValidation\Rules\Locale\ES\Address\PostalCode;

test('that we can successfully validate a Spanish postal code', function ($postalCode, $expectedResult) {
    $sut = new PostalCode();

    expect(
        $sut->passes('some-attribute', $postalCode)
    )->toBe($expectedResult);
})->with([
    ['01123', true],
    ['02123', true],
    ['03123', true],
    ['04123', true],
    ['05123', true],
    ['06123', true],
    ['07123', true],
    ['08123', true],
    ['09123', true],
    ['10123', true],
    ['11123', true],
    ['12123', true],
    ['13123', true],
    ['14123', true],
    ['15123', true],
    ['16123', true],
    ['17123', true],
    ['18123', true],
    ['19123', true],
    ['20123', true],
    ['21123', true],
    ['22123', true],
    ['23123', true],
    ['24123', true],
    ['25123', true],
    ['26123', true],
    ['27123', true],
    ['28123', true],
    ['29123', true],
    ['30123', true],
    ['31123', true],
    ['32123', true],
    ['33123', true],
    ['34123', true],
    ['35123', true],
    ['36123', true],
    ['37123', true],
    ['38123', true],
    ['39123', true],
    ['40123', true],
    ['41123', true],
    ['42123', true],
    ['43123', true],
    ['44123', true],
    ['45123', true],
    ['46123', true],
    ['47123', true],
    ['48123', true],
    ['49123', true],
    ['50123', true],
    ['51123', true],
    ['12345', true],
    ['38000', true],
    ['69420', false],
    ['123AB45', false],
]);

test('that the attribute is returned in the error message', function () {
    $sut = new PostalCode();

    expect(
        $sut->message()
    )->toContain(':attribute');
});
