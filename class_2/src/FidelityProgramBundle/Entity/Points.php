<?php

namespace Src\FidelityProgramBundle\Entity;

use Src\OrderBundle\Entity\Customer;

class Points
{
    private $customer;

    private $points;

    public function __construct(Customer $customer, $points)
    {
        $this->customer = $customer;
        $this->points = $points;
    }
}