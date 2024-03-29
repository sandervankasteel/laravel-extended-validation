<?php

use LaravelExtendedValidation\Rules\DateAndTime\TimeZoneAbbr;

test('that we can successfully validate timezone abbreviations', function ($timezone, $expectedOutput) {
    $sut = new TimeZoneAbbr();

    expect(
        $sut->passes('some-attribute', $timezone)
    )->toBe($expectedOutput);
})->with([
    ['acdt', true],
    ['acst', true],
    ['addt', true],
    ['adt', true],
    ['aedt', true],
    ['aest', true],
    ['ahdt', true],
    ['ahst', true],
    ['akdt', true],
    ['akst', true],
    ['amt', true],
    ['apt', true],
    ['ast', true],
    ['awdt', true],
    ['awst', true],
    ['awt', true],
    ['bdst', true],
    ['bdt', true],
    ['bmt', true],
    ['bst', true],
    ['cast', true],
    ['cat', true],
    ['cddt', true],
    ['cdt', true],
    ['cemt', true],
    ['cest', true],
    ['cet', true],
    ['cmt', true],
    ['cpt', true],
    ['cst', true],
    ['cwt', true],
    ['chst', true],
    ['dmt', true],
    ['eat', true],
    ['eddt', true],
    ['edt', true],
    ['eest', true],
    ['eet', true],
    ['emt', true],
    ['ept', true],
    ['est', true],
    ['ewt', true],
    ['ffmt', true],
    ['fmt', true],
    ['gdt', true],
    ['gmt', true],
    ['gst', true],
    ['hdt', true],
    ['hkst', true],
    ['hkt', true],
    ['hmt', true],
    ['hpt', true],
    ['hst', true],
    ['hwt', true],
    ['iddt', true],
    ['idt', true],
    ['imt', true],
    ['ist', true],
    ['jdt', true],
    ['jmt', true],
    ['jst', true],
    ['kdt', true],
    ['kmt', true],
    ['kst', true],
    ['lst', true],
    ['mddt', true],
    ['mdst', true],
    ['mdt', true],
    ['mest', true],
    ['met', true],
    ['mmt', true],
    ['mpt', true],
    ['msd', true],
    ['msk', true],
    ['mst', true],
    ['mwt', true],
    ['nddt', true],
    ['ndt', true],
    ['npt', true],
    ['nst', true],
    ['nwt', true],
    ['nzdt', true],
    ['nzmt', true],
    ['nzst', true],
    ['pddt', true],
    ['pdt', true],
    ['pkst', true],
    ['pkt', true],
    ['plmt', true],
    ['pmt', true],
    ['ppmt', true],
    ['ppt', true],
    ['pst', true],
    ['pwt', true],
    ['qmt', true],
    ['rmt', true],
    ['sast', true],
    ['sdmt', true],
    ['sjmt', true],
    ['smt', true],
    ['sst', true],
    ['tbmt', true],
    ['tmt', true],
    ['uct', true],
    ['utc', true],
    ['wast', true],
    ['wat', true],
    ['wemt', true],
    ['west', true],
    ['wet', true],
    ['wib', true],
    ['wita', true],
    ['wit', true],
    ['wmt', true],
    ['yddt', true],
    ['ydt', true],
    ['ypt', true],
    ['yst', true],
    ['ywt', true],
    ['vlat', false], // Vladivostock timezone
]);

test('that we get the attribute back in the error message', function () {
    $sut = new TimeZoneAbbr();

    expect(
        $sut->message()
    )->toContain(':attribute');
});

test('that we can also also validate timezones which are not in the $acceptedTimeZones array', function () {
    $sut = new TimeZoneAbbr();

    $sut->acceptedTimezones = [];

    expect(
        $sut->passes('some-attribute', 'cest')
    )->toBe(true);
});
