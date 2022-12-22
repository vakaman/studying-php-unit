<?php

class DiscountCalculatorTest
{
    const SUCCESS = "\xE2\x9C\x85";
    const FAIL = "\xE2\x9D\x8C";

    public function ShoudApplyWhenValueIsAboveTheMinimumTest()
    {
        $discountCalculator = new DiscountCalculator();

        $totalValue = 130;
        $totalWithDiscount = $discountCalculator->apply($totalValue);

        $expectedValue = 110;
        $this->assertEquals($expectedValue, $totalWithDiscount);
    }

    private function assertEquals($expectedValue, $actualValue)
    {
        if ($expectedValue !== $actualValue) {
            throw new Exception(self::FAIL . " Expected: {$expectedValue} but got: {$actualValue}");
        }

        echo self::SUCCESS . " Test passed! \n";
    }
}
