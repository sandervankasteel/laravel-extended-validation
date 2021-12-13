# IPv4

### `LaravelExtendedValidation\Rules\Network\IPv4`

This validation rule checks if the posted IP address is a valid IP address. By default, private IP addresses like
'192.168.x.y', '10.x.y.z' and '172.16.x.y' aren't considered valid. By setting the `$allowPrivateIpAddress` constructor
variable to `true`, they will be considered valid IP addresses.

## Constructor argument(s)

```php
$allowPrivateIpAddress: false
```
