<?php

namespace LaravelExtendedValidation\Rules\Database;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class LessThanOrEqualValue implements Rule
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


    public function __construct(string $table, string $column, string $identifierColumn, string $uniqueIdentifier)
    {
        $this->table = $table;
        $this->column = $column;

        $this->identifierColumn = $identifierColumn;
        $this->uniqueIdentifier = $uniqueIdentifier;
    }

    /**
     * @inheritDoc
     */
    public function passes($attribute, $value): bool
    {
        $res = DB::table($this->table)
            ->where($this->identifierColumn, $this->uniqueIdentifier)
            ->first();

        if ($res === null) {
            return false;
        }

        $this->foundValue = $res->{$this->column};

        return $value <= $this->foundValue;
    }

    /**
     * @inheritDoc
     */
    public function message(): string
    {
        return "$this->column can not be more then $this->foundValue";
    }
}
