<?php

namespace OrderBundle\Service;

use Src\OrderBundle\Entity\Customer;

class LightUserCategory implements CustomerCategoryInterface
{
    public function isEligible(Customer $customer)
    {
        return $customer->getTotalOrders() >= 5 && $customer->getTotalRatings() >= 1;
    }

    public function getCategoryName()
    {
        return CustomerCategoryService::CATEGORY_LIGHT_USER;
    }
}