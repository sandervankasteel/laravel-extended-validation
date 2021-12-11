# LessThanOrEqualValue
## `LaravelExtendedValidation\Rules\Database\LessThanOrEqualValue;`

A validation rule that checks if the POSTed value is less or equal to a value found in a database row.

Please note, this validation fails when it can not find a record to compare against.

## Constructor argument(s)

```php
$table = '' // Table name to search in
$column = '' // Column the compare the value with.
$identifierColumn = '' // Identifying column
$uniqueIdentifier = '' // Unique identifying value for a row (Would most likely be a primary key value)
```

## Example

```php
class DiscountPriceController extends Controller 
{
    public function storeDiscountedPrice(Request $request)
    {
        $validated = $request->validate([
            'product_id' => [
                'required',
                'numeric',
                'exists:products,id'
            ],
            'price' => [
                'required'
                'numeric' ,
                 new LessThanOrEqualValue(
                    'products',
                    'price',
                    'id',
                    $request->product_id,
                );
            ],
        ]);
        
        return Discount::create([
            'product_id' => $validated->['product_id'],
            'price' => $validated->['price']
        ]);
    }

}
```