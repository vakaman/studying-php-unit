<?php

namespace Src\OrderBundle\Validators;

class NumericValidator
{
    private $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function isValid()
    {
        if (is_string($this->value)) {
            return false;
        }
        return is_numeric($this->value);
    }
}
