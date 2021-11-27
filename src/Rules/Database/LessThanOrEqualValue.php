<?php

namespace SandervanKasteel\LaravelExtendedValidation\Rules\Database;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class LessThanOrEqualValue implements Rule
{
    private $column;

    private $table;

    private $identifierColumn;

    private $uniqueIdentifier;

    private $foundValue;

    public function __construct($table, $column, $identifierColumn, $uniqueIdentifier)
    {
        $this->table = $table;
        $this->column = $column;

        $this->identifierColumn = $identifierColumn;
        $this->uniqueIdentifier = $uniqueIdentifier;
    }

    /**
     * @inheritDoc
     */
    public function passes($attribute, $value)
    {
        $res = DB::table($this->table)
            ->where($this->identifierColumn, $this->uniqueIdentifier)
            ->get($this->column)
            ->first();

        if($res === null) {
            return false;
        }

        $this->foundValue = $res->{$this->column};

        return $value <= $this->foundValue;
    }

    /**
     * @inheritDoc
     */
    public function message()
    {
        return "$this->column can not be more then $this->foundValue";
    }
}