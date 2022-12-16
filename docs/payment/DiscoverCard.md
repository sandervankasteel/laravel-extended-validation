# Discover Card
This validation rules checks if the posted input is a valid Discover Card number based on their Compliance documentation
released in August 2021 [https://www.discoverglobalnetwork.com/content/dam/discover/en_us/dgn/pdfs/IPP-VAR-Enabler-Compliance.pdf](https://www.discoverglobalnetwork.com/content/dam/discover/en_us/dgn/pdfs/IPP-VAR-Enabler-Compliance.pdf)

### Class
`LaravelExtendedValidation\Rules\Payment\DiscoverCard`

Please note, this is no way a check if the number is actually given out by Discover Card or has sufficient funds!

Valid examples are:

- 6011 6011 6011 6611
- 6445 6445 6445 6445

### Constructor argument(s)

```php
none
```
