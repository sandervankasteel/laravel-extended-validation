<?php

use LaravelExtendedValidation\Rules\Barcode\ISBN10;
use LaravelExtendedValidation\Rules\Barcode\ISBN13;
use LaravelExtendedValidation\Rules\General\OrRule;

test('that we can successfully validate two rules', function ($validators, $value, $expectedOutput) {
    $sut = new OrRule($validators);

    expect(
        $sut->passes('some-attribute', $value)
    )->toBe($expectedOutput);
})->with([
    [
        [new ISBN13(), new ISBN10()],
        '978-0-306-40615-7',
        true,
    ],
    [
        [new ISBN13(), new ISBN10()],
        'abcd1234',
        false,
    ],
]);

test('that an exception is throw when an validator does not implement the Rule interface', function () {
    $sut = new OrRule([
        new stdClass(),
        new ISBN13(),
    ]);

    expect(function () use ($sut) {
        $sut->passes('some-attribute', '978-0-306-40615-7');
    })->toThrow("stdClass does not implement Illuminate\Contracts\Validation\Rule interface");
});

test('that the error messages contain an :attribute', function () {
    $sut = new OrRule([
        new ISBN10(),
        new ISBN13(),
    ]);

    expect(
        $sut->message()
    )->toContain(':attribute');
});

test('that the error messages are being joined when all the passed validation rules fail', function () {
    $sut = new OrRule([
        new ISBN10(),
        new ISBN13(),
    ]);

    expect(
        $sut->message()
    )->toBe(':attribute does not contain a valid ISBN10 number or :attribute does not have a valid ISBN13 number');
});
