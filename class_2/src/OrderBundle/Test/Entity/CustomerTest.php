<?php

namespace App\OrderBundle\Test\Validator;

use PHPUnit\Framework\TestCase;
use Src\OrderBundle\Entity\Customer;

class CustomerTest extends TestCase
{
    /**
     * @dataProvider valueProvider
     */
    public function test_is_valid($active, $blocked, $expected)
    {
        $customer = new Customer(
            $active,
            $blocked,
            'Customer Name',
            '51999999999'
        );

        $result = $customer->isAllowedToOrder();

        $this->assertEquals($expected, $result);
    }

    public static function valueProvider()
    {
        return [
            'allowed_to_order_when_active_and_unblocked' => ['active' => true, 'blocked' => false, 'expected' => true],
            'not_allowed_to_order_when_active_and_blocked' => ['active' => true, 'blocked' => true, 'expected' => false],
            'not_allowed_to_order_when_unactive_and_blocked' => ['active' => false, 'blocked' => true, 'expected' => false],
            'not_allowed_to_order_when_unactive_and_unblocked' => ['active' => false, 'blocked' => false, 'expected' => false]
        ];
    }
}
