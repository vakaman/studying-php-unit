<?php

namespace App\OrderBundle\Test\Validator;

use PHPUnit\Framework\TestCase;
use Src\OrderBundle\Validators\CreditCardExpirationValidator;

class CreditCardExpirationValidatorTest extends TestCase
{
    /**
     * @dataProvider valueProvider
     */
    public function test_is_valid($value, $expectedResult)
    {
        $creditCardExpirationValidator = new CreditCardExpirationValidator($value);

        $isValid = $creditCardExpirationValidator->isValid();

        $this->assertEquals($expectedResult, $isValid);
    }

    public static function valueProvider()
    {
        return [
            'should_not_be_valid_when_data_less_then_today' => ['value' => new \DateTime('2023-02-14'), 'expectedResult' => false],
            'should_not_be_valid_when_data_is_today' => ['value' => new \DateTime('now'), 'expectedResult' => false],
            'should_be_valid_when_data_is_more_then_today' => ['value' => (new \DateTime('now'))->modify('+1 day'), 'expectedResult' => true],
        ];
    }
}
