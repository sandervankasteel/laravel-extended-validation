# Postalcode
### `LaravelExtendedValidation\Rules\Locale\IT\Address\PostalCode`

Determines if the supplied postal code ('CAP' / Codice di Avviamento Postale) is a valid Italian postal code.

Since The Vatican and San Marino are part of the Italian Postal System, there are constructor arguments to allow those postal codes.

Please note that `00120` is the postal code of The Vactican and postal codes starting with `4789` belong to San Marino.  

## Constructor argument(s)

```php
$allowVatican: false,
$allowSanMarino: false
```