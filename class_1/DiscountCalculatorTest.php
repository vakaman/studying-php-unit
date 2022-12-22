<?php

class DiscountCalculatorTest
{

    public function ShoudApplyWhenValueIsAboveTheMinimum()
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
            throw new Exception("Expected: {$expectedValue} but got: {$actualValue}");
        }
    }
}
