# Postal code
Determines if the supplied postalcode (zipcode / 'postnummer') is a valid Belgium postalcode.


When you instanciate the Rule you have the allow "special postal codes" to be considered valid.
More info on the special postal codes: [https://www.bpost2.be/zipcodes/files/zipcodes_prov_nl_new.pdf](https://www.bpost2.be/zipcodes/files/zipcodes_prov_nl_new.pdf)

### Class
`LaravelExtendedValidation\Rules\Locale\BE\Address\PostalCode`

### Constructor argument(s)

```php
// If we should also check for "special" postal codes 
$checkForSpecialPostalCodes: false
```