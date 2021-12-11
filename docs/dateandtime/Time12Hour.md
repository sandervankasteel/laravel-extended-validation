# Time12Hour
### `LaravelExtendedValidation\Rules\DateAndTime\Time12Hour`

This validation rules checks if the posted input is a valid 12-hour time. Please note that posted times like `12:42:72` are
considered to be invalid because they overflow a particular unit of time (in this case seconds.)

## Constructor argument(s)

```php
$requiresMeridiem = false; // Requires the meridiem (AM or PM) to be present in the posted string. 
$timeSeparator = ':';
```