# Laravel Extended Validation

[![Automated tests](https://github.com/sandervankasteel/laravel-extended-validation/actions/workflows/tests.yml/badge.svg)](https://github.com/sandervankasteel/laravel-extended-validation/actions/workflows/tests.yml)
[![codecov](https://codecov.io/gh/sandervankasteel/laravel-extended-validation/branch/main/graph/badge.svg?token=OwUljizrrZ)](https://codecov.io/gh/sandervankasteel/laravel-extended-validation)
[![Security Rating](https://sonarcloud.io/api/project_badges/measure?project=sandervankasteel_laravel-extended-validation&metric=security_rating)](https://sonarcloud.io/summary/new_code?id=sandervankasteel_laravel-extended-validation)
[![Maintainability Rating](https://sonarcloud.io/api/project_badges/measure?project=sandervankasteel_laravel-extended-validation&metric=sqale_rating)](https://sonarcloud.io/summary/new_code?id=sandervankasteel_laravel-extended-validation)
[![Quality Gate Status](https://sonarcloud.io/api/project_badges/measure?project=sandervankasteel_laravel-extended-validation&metric=alert_status)](https://sonarcloud.io/summary/new_code?id=sandervankasteel_laravel-extended-validation)


This packages hopes to provide you with a lot of useful additional validation rules :)

## Installation

Laravel Extended Validation requires PHP >= 7.3 and works with Laravel >= 7.0 (and higher).

```shell
composer require sandervankasteel/laravel-extended-validation
```

## Validated versions

Laravel Extended Validation has been tested against the following PHP and Laravel version combinations

|             | PHP 7.3 | PHP 7.4 | PHP 8.0 | PHP 8.1 | PHP 8.1 |
|-------------|---------|---------|---------|---------|---------|
| Laravel 7.0 | ✅       | ✅       | ✅       | ❌       | ❌       |
| Laravel 8.0 | ✅       | ✅       | ✅       | ✅       | ✅       |
| Laravel 9.0 | ❌       | ❌       | ✅       | ✅       | ✅       |



## Usage

All validation rules can be used as any regular Rule object, as mentioned in the [Laravel documentation](https://laravel.com/docs/8.x/validation#using-rule-objects).