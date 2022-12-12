# Changelog

## [0.6.0] - 12-12-2022

### Added
- Added British VAT rule
- Added testing with PHP 8.2

### Fixed
- Issue that the TLD of a domain couldn't be longer then 6 characters [#125](https://github.com/sandervankasteel/laravel-extended-validation/issues/125)


## [0.5.0] - 24-07-2022

### Added
- Added Japanese Postal code rule
- Added Russian Postal code rule
- Added Swedish Postal code rule
- Added Danish Postal code rule
- Added Greek Postal code rule
- Added BSB number rule
- Added docker-compose for development
- Added Laravel 9.x support
- Added support for PHP 8.1

### Changed
- Refactored RBG and RGBA rules
- Renamed "UK" namespace to "GB"

## [0.4.0] - 26-01-2022

### Added

- RGB validation rule
- RGBA validation rule
- Luxembourg postal code rule
- Spanish postal code rule
- Italian postal code rule
- Irish postal code rule
- South Korean (ROK) postal code rule
- Discover card validation rule
- Portuguese postal code rule
- Spanish VAT number
- Domain name rule
- Italian VAT number

## [0.3.0] - 09-01-2022

### Added

- EAN8 validation rule
- EAN5 validation rule
- EAN13 validation rule
- UPC-A validation rule
- UPC-E validation rule
- JAN (Japanese Article Number) validation rule
- ASIN validation rule
- Added TimeZoneAbbr Rule


## [0.2.0] - 02-01-2022

### Added

- Added IPv4 validation rule
- Added IPv6 validation rule
- Added Mac Address validation rule
- Added Luxembourg VAT number validation
- Added German VAT number validation
- Added Belgium VAT number validation
- Added French VAT number validation
- Added UK Postal Code validation
- Added German Postal Code validation
- Added American Express validation rule
- Added MasterCard validation rule
- Added Visa validation rule


## [0.1.1] - 13-12-2021

- Fixed issue with loading Service Provider

## [0.1.0] - 11-12-2021 (First Release 🥳)

### Added

- Rule for Dutch postal codes
- Rule for Dutch Social Security numbers
- Rule for Dutch VAT numbers
- Rule for Belgium postal codes
- Added Database/LessThanValue rule
- Added Database/LessThanOrEqualValue rule
- Added Database/MoreThanValue rule
- Added Database/MoreThanOrEqualValue rule
- Added Database/MustBeEqualValue rule
- Added Color/HexColor rule
- Added rule for IBAN numbers
- Added rule for 10 digit's ISBN numbers
- Added rule for 13 digit's ISBN numbers
- Added rule for a 12hour time format
- Added rule for a 24hour time format
- Added rule for validating UNIX timestamps
- Added "OrRule"