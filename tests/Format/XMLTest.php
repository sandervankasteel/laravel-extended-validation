<?php

test('that we can successfully validate XML', function ($value, $expectedResult) {
    $sut = new XML();

    expect(
        $sut->passes('some_attribute', $value)
    )->toBe($expectedResult);

})->with([
    [ file_get_contents(__DIR__ . '/files/valid.xml'), true],
    [ file_get_contents(__DIR__ . '/files/invalid.xml'), false],
]);

test('that the error message contains the attribute', function () {
    $sut = new XML();

    expect(
        $sut->message()
    )->toContain(':attribute');
});