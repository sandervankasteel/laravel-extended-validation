# Postalcode
### `LaravelExtendedValidation\Rules\Locale\UK\Address\PostalCode`

Determines if the supplied postalcode (postcode) is conforming to the UK standard of postalcodes.

Valid examples are:

- EC1A 1BB
- W1T 1FB
- ASCN 1ZZ (if, `$allowSpecialCases` is set to `true`, since this is a British Overseas Territory)

## Constructor argument(s)

```php
// Verifies if British Overseas Territories are also allowed
$allowSpecialCases: false
```

| List of allowed British Overseas Territories |
|----------------------------------------------|
| Ascension Island                             |
| British Indian Ocean Territory               |
| British Antarctic Territory                  |
| Falkland Islands                             |
| Gibraltar                                    |
| Pitcairn Islands                             |
| South Georgia and the South Sandwich Islands |
| Saint Helena                                 |
| Tristan da Cunha                             |
| Turks and Caicos Islands                     |
