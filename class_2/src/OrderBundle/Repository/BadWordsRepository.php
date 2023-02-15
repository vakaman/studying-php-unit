<?php

namespace Src\OrderBundle\Repository;

use App\MyFramework\DataBase\ORM;
use Src\OrderBundle\Repository\BadWordsRepositoryInterface;

class BadWordsRepository extends ORM implements BadWordsRepositoryInterface
{
    public function findAllAsArray()
    {
        return parent::findAll();
    }
}
