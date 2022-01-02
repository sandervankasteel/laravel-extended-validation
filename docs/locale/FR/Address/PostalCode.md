# Postalcode
### `LaravelExtendedValidation\Rules\Locale\FR\Address\PostalCode`

Determines if the supplied postal code ('code postal') is a valid French postal code.

Since Monaco is part of the French Postal System, there is a constructor argument to (dis)allow Monacan postal codes. 

Please note:
1. military postal codes (starting with 00) are considered valid 
2. postal codes starting with 96, 98 and 99 are currently not being used and thus are considered invalid.

## Constructor argument(s)

```php
$allowMonaco: false
```