<?php

use Illuminate\Support\Facades\DB;
use LaravelExtendedValidation\Rules\Database\LessThanValue;

beforeEach(function () {
    $this->loadMigrationsFrom(__DIR__.'/migrations');
});

test('that a presented value that is lower then what is found in the database is considered valid', function () {
    DB::table('products')
        ->insert([
            'name' => 'Test product',
            'price' => '5000',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    $sut = new LessThanValue(
        'products',
        'price',
        'id',
        1
    );

    $this->assertTrue(
        $sut->passes('some-attribute', 4000)
    );
});

test('That if a record to compare against is not found, then we also return false', function () {
    DB::table('products')
        ->insert([
            'name' => 'Test product',
            'price' => '5000',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    $sut = new LessThanValue(
        'products',
        'price',
        'id',
        2
    );

    $this->assertFalse(
        $sut->passes('some-attribute', 4000)
    );
});

test('that a presented value that is higher then what is found in the database is considered invalid', function () {
    DB::table('products')
        ->insert([
            'name' => 'Test product',
            'price' => '5000',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    $sut = new LessThanValue(
        'products',
        'price',
        'id',
        1
    );

    $this->assertFalse(
        $sut->passes('some-attribute', 5001)
    );
});

test('that a an equal value as found found in the database is also considered invalid', function () {
    DB::table('products')
        ->insert([
            'name' => 'Test product',
            'price' => '5000',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    $sut = new LessThanValue(
        'products',
        'price',
        'id',
        1
    );

    $this->assertFalse(
        $sut->passes('some-attribute', 5000)
    );
});

test('that the column and found value are returned in the message function', function () {
    DB::table('products')
        ->insert([
            'name' => 'Test product',
            'price' => '5000',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    $sut = new LessThanValue(
        'products',
        'price',
        'id',
        1
    );

    $this->assertFalse(
        $sut->passes('some-attribute', 5001)
    );

    $message = $sut->message();
    $this->assertStringContainsString('price', $message);
    $this->assertStringContainsString('5000', $message);
});
