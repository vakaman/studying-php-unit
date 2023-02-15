<?php

namespace OrderBundle\Service;

use Src\OrderBundle\Entity\Customer;

class NewUserCategory implements CustomerCategoryInterface
{
    public function isEligible(Customer $customer)
    {
        return true;
    }

    public function getCategoryName()
    {
        return CustomerCategoryService::CATEGORY_NEW_USER;
    }
}