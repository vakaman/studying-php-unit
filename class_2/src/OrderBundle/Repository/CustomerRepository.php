<?php

namespace OrderBundle\Repository;

use MyFramework\DataBase\ORM;

use Src\OrderBundle\Entity\Customer;

class CustomerRepository extends ORM
{
    /**
     * @param $customerID
     * @return Customer
     */
    public function findByID($customerID)
    {
        return parent::findByID($customerID);
    }
}