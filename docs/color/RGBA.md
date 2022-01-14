# RGBA
### `LaravelExtendedValidation\Rules\Color\RGBA`

This validation rules checks if the posted input is a valid RGB color code. The color values should be between `0` and `255`.
and the alpha channel should be between `0.1` and `1.0`.

The validator does not care about casing of the 'RGBA' section.

```
- rgba(255,255,255,0.1)
- RGBA(255,255,255,0.5)
```

## Constructor argument(s)

```php
none
```