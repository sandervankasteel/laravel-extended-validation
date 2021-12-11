# MoreThanValueOrEqualValue
## `LaravelExtendedValidation\Rules\Database\MoreThanValueOrEqualValue;`

A validation rule that checks if the POSTed value is more or equal to a value found in a database row.

Please note, this validation fails when it can not find a record to compare against.

## Constructor argument(s)

```php
$table = '' // Table name to search in
$column = '' // Column the compare the value with.
$identifierColumn = '' // Identifying column
$uniqueIdentifier = '' // Unique identifying value for a row (Would most likely be a primary key value)
```
