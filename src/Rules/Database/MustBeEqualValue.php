<?php

namespace SandervanKasteel\LaravelExtendedValidation\Rules\Database;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class MustBeEqualValue implements Rule
{
    /**
     * @var mixed|string
     */
    private $column;

    private $table;

    private $identifierColumn;

    private $uniqueIdentifier;

    private $foundValue;

    private $postedValue;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($table, $column, $identifierColumn, $uniqueIdentifier)
    {
        $this->table = $table;
        $this->column = $column;

        $this->identifierColumn = $identifierColumn;
        $this->uniqueIdentifier = $uniqueIdentifier;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $result = DB::table($this->table)
            ->where($this->identifierColumn, $this->uniqueIdentifier)
            ->first();

        if ($result === null) {
            return false;
        }

        $this->foundValue = $result->{$this->column};
        $this->postedValue = $value;

        return $this->foundValue == $this->postedValue;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "The found value '{$this->foundValue}' does not match '{$this->postedValue}'";
    }
}
