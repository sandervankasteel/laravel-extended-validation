<?php

use LaravelExtendedValidation\Rules\Barcode\ISMN;

test('That we can successfully validate an ISMN number', function ($ismnNumber, $expectedOutcome) {
    $sut = new ISMN();

    expect(
        $sut->passes('some-attribute', $ismnNumber)
    )->toBe($expectedOutcome);
})->with([
    ['979-0-2306-7118-7', true],
    ['979-0-9016791-7-7', true],
    ['979_0_9016791_7_7', true],
    ['979-0-060-11561-5', true],
    ['9790230671187', true],
    ['979 0 2306 7118 7', true],
    ['9790230671188', false],
    ['9790230671188', false],
    ['979-0-060-11561', false],
    ['979-0-060-11561-54', false],
]);

test('that the attribute is being returned in the error message', function () {
    $sut = new ISMN();

    expect(
        $sut->message()
    )->toContain(':attribute');
});
