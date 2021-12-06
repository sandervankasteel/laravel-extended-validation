<?php

use SandervanKasteel\LaravelExtendedValidation\Rules\Color\HexColor;

test('something', function($hexColor, $valid) {
    $sut = new HexColor();

    expect(
        $sut->passes('some-attribute', $hexColor)
    )->toBe($valid);

})->with([
    [ '00ff00', true ],
    [ '#00ff00', true ],
    [ '#fff', true ],
    [ '#ff00ff00', false ],
]);

test('that the message function returns the attribute in the error message', function() {
    $sut = new HexColor();

    $sut->passes('some-attribute', '#1234567890');

    expect(
        $sut->message()
    )->toContain(':attribute');
});