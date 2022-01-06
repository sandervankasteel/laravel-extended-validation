<?php

namespace LaravelExtendedValidation\Rules\Database;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class MustBeEqualValue implements Rule
{
    /**
     * @var string
     */
    private $column;

    /**
     * @var string
     */
    private $table;

    /**
     * @var string
     */
    private $identifierColumn;

    /**
     * @var string
     */
    private $uniqueIdentifier;

    /**
     * @var mixed
     */
    private $foundValue;

    /**
     * @var mixed
     */
    private $postedValue;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(string $table, string $column, string $identifierColumn, string $uniqueIdentifier)
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
    public function passes($attribute, $value): bool
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
    public function message(): string
    {
        return "The found value '{$this->foundValue}' does not match '{$this->postedValue}'";
    }
}
