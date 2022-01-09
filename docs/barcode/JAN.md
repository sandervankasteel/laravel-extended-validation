# JAN
### `LaravelExtendedValidation\Rules\Barcode\JAN`

This validation rules checks if the posted input is a valid JAN (Japanese Article Number) number.

It basically does the same check as the EAN13 rule with the addition that a JAN barcode SHOULD start with either "45" or "49".

Valid examples:

- 4988009045368
- 4988009031897
- 4988010023133
- 4514392200031

## Constructor argument(s)

```php
none
```