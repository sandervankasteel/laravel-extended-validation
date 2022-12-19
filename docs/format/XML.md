# XML
Checks if the incoming string can be parsed as valid XML. It will accept XML with and without CDATA.

Example of accepted input without CDATA:

```xml
<?xml version='1.0'?>
<document>
    <title>Forty What?</title>
    <from>Joe</from>
    <to>Jane</to>
    <body>
        I know that's the answer -- but what's the question?
    </body>
</document>
```

Example of accepted input with CDATA:

```xml
<?xml version='1.0'?>
<document>
    <title>Forty What?</title>
    <from>Joe</from>
    <to>Jane</to>
    <body>
        I know that's the answer -- but what's the question?
    </body>
    <cdata-example>
        <![CDATA[
            <div> <p> lorum ipsum </p> </div>
        ]]>
    </cdata-example>
</document>
```

### Class
`LaravelExtendedValidation\Rules\Format\XML`

### Constructor argument(s)

```php
none
```
