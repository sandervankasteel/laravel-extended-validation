# OrRule
This validation rules checks, if one of the supplied validation rules is considered to be valid. It fails when ALL rules fail validation.

### Class
`LaravelExtendedValidation\Rules\General\OrRule`


### Constructor argument(s)

```php
$rules: [] // Illuminate\Contracts\Validation\Rule[]
```

### Exceptions
- \Exception is thrown when one of the supplied rules in the constructor does not implement the Illuminate\Contracts\Validation\Rule interface.

### Example implementation

In this use case, we want to update a Book model. The supplied ISBN number should either be an ISBN10 OR an ISBN13 number. 

```php
public function update(Request $request, Book $book)
{
    $validated = $request->validate([
              'isbn' => [
                  'required',
                    new OrRule([
                        new ISBN10(),
                        new ISBN13(),
                    ]),
              'title' => [
                  'required,
              ],
          ]);

	  return $book->update($validated);
}
```