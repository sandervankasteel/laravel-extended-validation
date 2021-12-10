# Time24Hour
### `SandervanKasteel\LaravelExtendedValidation\Rules\DateAndTime\Time24Hour`

This validation rules checks if the posted input is a valid 24-hour time. Please note that posted times like `12:42:72` are
considered to be invalid because they overflow a particular unit of time (in this case seconds.)

## Constructor argument(s)

```php 
$timeSeparator = ':';
```