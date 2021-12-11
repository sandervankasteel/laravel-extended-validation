<?php

use LaravelExtendedValidation\Rules\Locale\BE\Address\PostalCode;

test('that we can successfully validate a postal code', function($postalCode, $expectedOutput) {
    $sut = new PostalCode();
    expect(
        $sut->passes('some-attribute', $postalCode)
    )->toBe($expectedOutput);
})->with([
    ["1000", true],
    ["2018", true], // Can you guess, who this postal code belongs to ? 👀
    ["9992", true],
    ["9993", false],
]);

test('that special designated postalcodes can also be validated', function($postalCode, $expectedOutput) {
    $sut = new PostalCode(true);
    expect(
        $sut->passes('some-attribute', $postalCode)
    )->toBe($expectedOutput);
})->with([
    ["0612", true], // Sinterklaas
    ["1005", true], // Verenigde Vergadering van de Gemeenschappelijke
    ["1006", true], // Raad van de Vlaamse Gemeenschapscommissie
    ["1007", true], // Assemblée de la Commission Communautaire Française
    ["1008", true], // Kamer van Volksvertegenwoordigers
    ["1009", true], // Belgische Senaat
    ["1011", true], // Vlaams Parlement
    ["1012", true], // Parlement de la communauté française
    ["1031", true], // Christelijke Sociale Organisaties
    ["1033", true], // RTL-TVI
    ["1035", true], // Ministerie van het Brussels Hoofdstedelijk Gewest
    ["1041", true], // International press center
    ["1043", true], // VRT
    ["1044", true], // RTBF
    ["1046", true], // European External Action Service
    ["1047", true], // Europees Parlement
    ["1048", true], // Europese unie - Raad
    ["1049", true], // Europese unie - Commissie
    ["1099", true], // Brussel X
    ["1100", true], // Postcheque
    ["1101", true], // Scanning
    ["1105", true], // ACTISOC
    ["1110", true], // NATO
    ["1212", true], // FOD Mobiliteit
    ["1733", true], // HighCo DATA
    ["1804", true], // Cargovil
    ["1818", true], // VTM
    ["1931", true], // Brucargo
    ["1934", true], // Office Exchange Brussels Airport Remailing
    ["1935", true], // Corporate Village
    ["2099", true], // Antwerpen X
    ["4099", true], // Liège X
    ["5010", true], // SA SudPresse
    ["5012", true], // Parlement Wallon
    ["5589", true], // Jemelle
    ["6075", true], // CSM Charleroi X
    ["6099", true], // Charleroi X
    ["7010", true], // SHAPE
    ["7510", true], // 3 Suisses
    ["7511", true], // Vitrine Magique
    ["7512", true], // DANIEL JOUVANCE
    ["7513", true], // Yves Rocher
    ["9075", true], // CSM Gent X
    ["9099", true], // Gent X
]);

test('that the validation for special designated postalcodes fail when it they should not be checked', function($postalCode, $expectedOutput) {
    $sut = new PostalCode();
    expect(
        $sut->passes('some-attribute', $postalCode)
    )->toBe($expectedOutput);
})->with([
    ["0612", false], // Sinterklaas
    ["1005", false], // Verenigde Vergadering van de Gemeenschappelijke
    ["1006", false], // Raad van de Vlaamse Gemeenschapscommissie
    ["1007", false], // Assemblée de la Commission Communautaire Française
    ["1008", false], // Kamer van Volksvertegenwoordigers
    ["1009", false], // Belgische Senaat
    ["1011", false], // Vlaams Parlement
    ["1012", false], // Parlement de la communauté française
    ["1031", false], // Christelijke Sociale Organisaties
    ["1033", false], // RTL-TVI
    ["1035", false], // Ministerie van het Brussels Hoofdstedelijk Gewest
    ["1041", false], // International press center
    ["1043", false], // VRT
    ["1044", false], // RTBF
    ["1046", false], // European External Action Service
    ["1047", false], // Europees Parlement
    ["1048", false], // Europese unie - Raad
    ["1049", false], // Europese unie - Commissie
    ["1099", false], // Brussel X
    ["1100", false], // Postcheque
    ["1101", false], // Scanning
    ["1105", false], // ACTISOC
    ["1110", false], // NATO
    ["1212", false], // FOD Mobiliteit
    ["1733", false], // HighCo DATA
    ["1804", false], // Cargovil
    ["1818", false], // VTM
    ["1931", false], // Brucargo
    ["1934", false], // Office Exchange Brussels Airport Remailing
    ["1935", false], // Corporate Village
    ["2099", false], // Antwerpen X
    ["4099", false], // Liège X
    ["5010", false], // SA SudPresse
    ["5012", false], // Parlement Wallon
    ["5589", false], // Jemelle
    ["6075", false], // CSM Charleroi X
    ["6099", false], // Charleroi X
    ["7010", false], // SHAPE
    ["7510", false], // 3 Suisses
    ["7511", false], // Vitrine Magique
    ["7512", false], // DANIEL JOUVANCE
    ["7513", false], // Yves Rocher
    ["9075", false], // CSM Gent X
    ["9099", false], // Gent X
]);

test('that the attribute is being returned in the error message', function() {
    $sut = new PostalCode();
    expect(
        $sut->message()
    )->toContain(':attribute');
});