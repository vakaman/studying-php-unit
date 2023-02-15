<?php

namespace Src\FidelityProgramBundle\Repository;

use App\MyFramework\DataBase\ORM;
use Src\FidelityProgramBundle\Repository\PointsRepositoryInterface;

class PointsRepository extends ORM implements PointsRepositoryInterface
{
    public function save($points)
    {
        return parent::persist($points);
    }
}