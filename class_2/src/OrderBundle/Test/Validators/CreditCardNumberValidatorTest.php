<?php

namespace App\OrderBundle\Test\Validator;

use PHPUnit\Framework\TestCase;
use Src\OrderBundle\Validators\CreditCardNumberValidator;

class CreditCardNumberValidatorTest extends TestCase
{
    /**
     * @dataProvider valueProvider
     */
    public function test_is_valid($value, $expectedResult)
    {
        $creditCardNumberValidator = new CreditCardNumberValidator($value);

        $isValid = $creditCardNumberValidator->isValid();

        $this->assertEquals($expectedResult, $isValid);
    }

    public static function valueProvider()
    {
        return [
            'should_not_be_valid_when_less_then_16_numbers' => ['value' => '123456789101112', 'expectedResult' => false],
            'should_be_valid_when_have_16_numbers' => ['value' => '1234567891011121', 'expectedResult' => true],
            'should_not_be_valid_when_more_then_16_numbers' => ['value' => '12345678910111213', 'expectedResult' => false],
            'should_not_be_valid_when_is_not_numeric' => ['value' => 'abcdefghijlmnopqrst', 'expectedResult' => false]
        ];
    }
}
