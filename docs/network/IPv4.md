# IPv4
This validation rule checks if the posted IP address is a valid IPv4 address. 

By default, private IP addresses like '192.168.x.y', '10.x.y.z' and '172.16.x.y' aren't considered valid. Setting the `$allowPrivateIpAddress` constructor
variable to `true`, they will be considered valid IP addresses.


### Class
`LaravelExtendedValidation\Rules\Network\IPv4`

### Constructor argument(s)

```php
$allowPrivateIpAddress: false
```
