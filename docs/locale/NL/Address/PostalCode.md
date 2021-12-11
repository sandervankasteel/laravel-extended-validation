# Postalcode
### `LaravelExtendedValidation\Rules\Locale\NL\Address\PostalCode`

Determines if the supplied postalcode (zipcode / postcode) is conforming to the Dutch standard of postalcodes.

Valid examples are:

- 1234AB
- 1234 AB

## Constructor argument(s)

```php
// Determines if a zipcode may contain.
// For example, '1234 AB' will be considered valid when $mayContainSpace is set to true.
$mayContainSpace: false
```