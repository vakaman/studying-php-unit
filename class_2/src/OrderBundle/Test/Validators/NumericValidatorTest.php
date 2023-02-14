<?php

namespace App\OrderBundle\Test\Validator;

use PHPUnit\Framework\TestCase;
use Src\OrderBundle\Validators\NumericValidator;

class NumericValidatorTest extends TestCase
{
    /**
     * @dataProvider valueProvider
     */
    public function test_is_valid($value, $expectedResult)
    {
        $numericValidator = new NumericValidator($value);

        $isValid = $numericValidator->isValid();

        $this->assertEquals($expectedResult, $isValid);
    }

    public static function valueProvider()
    {
        return [
            'test_should_not_be_valid_when_value_is_not_numeric' => ['value' => '123', 'expectedResult' => false],
            'test_should_be_valid_when_value_is_numeric' => ['value' => 123, 'expectedResult' => true]
        ];
    }
}
