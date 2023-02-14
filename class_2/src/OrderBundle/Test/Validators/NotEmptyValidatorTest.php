<?php

namespace App\OrderBundle\Test\Validator;

use Src\OrderBundle\Validators\NotEmptyValidator;
use PHPUnit\Framework\TestCase;

class NotEmptyValidatorTest extends TestCase
{
    public function test_should_not_be_valid_when_value_is_empty()
    {
        $notEmptyValidator = new NotEmptyValidator('');

        $isValid = $notEmptyValidator->isValid();

        $this->assertFalse($isValid);
    }

    public function test_should_be_valid_when_value_is_not_empty()
    {
        $notEmptyValidator = new NotEmptyValidator('duvidei');

        $isValid = $notEmptyValidator->isValid();

        $this->assertTrue($isValid);
    }

    public function test_is_valid()
    {
        $dataProvider = [
            '' => false,
            'duvidei' => true
        ];

        foreach ($dataProvider as $value => $expectedValue) {
            $notEmptyValidator = new NotEmptyValidator($value);

            $isValid = $notEmptyValidator->isValid();

            $this->assertEquals($expectedValue, $isValid);
        }
    }
}
