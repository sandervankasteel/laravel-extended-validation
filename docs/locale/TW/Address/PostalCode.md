# Postal code

Determines if the supplied postal code is conforming to the Taiwanese standard of postal codes.
This validation rule has the option of validating both 3+2 and 3+3 postal codes.

By default both 3+2 and 3+3 postal codes are accepted. You can switch off accepting 3+2 postal codes
by setting the `$allowPlusTwo` constructor parameter to false.

Valid examples of 3+3 postal codes

- 300-096
- 300-196


Valid examples of 3+2 postal codes

- 300-75
- 741-44


### `LaravelExtendedValidation\Rules\Locale\TW\Address\PostalCode`

### Constructor argument(s)

```php
$allowPlusTwo = true
```