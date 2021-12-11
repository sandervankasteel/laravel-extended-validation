<?php

namespace LaravelExtendedValidation\Rules\General;

use Exception;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Arr;

class OrRule implements Rule
{
    private $rules;

    /**
     * @param Rule[] $rules
     */
    public function __construct($rules = [])
    {
        $this->rules = $rules;
    }

    /**
     * @throws Exception
     */
    public function passes($attribute, $value): bool
    {
        foreach ($this->rules as $rule) {
            if (! Arr::has(class_implements($rule), Rule::class)) {
                $className = class_basename($rule);
                throw new Exception("$className does not implement Illuminate\Contracts\Validation\Rule interface");
            }

            $passes = $rule->passes($attribute, $value);

            if ($passes) {
                return true;
            }
        }

        return false;
    }

    public function message(): string
    {
        return collect($this->rules)
            ->map(function ($rule) {
                return $rule->message();
            })->join(' or ');
    }
}
