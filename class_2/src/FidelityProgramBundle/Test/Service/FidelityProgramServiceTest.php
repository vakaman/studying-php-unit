<?php

namespace Src\FidelityProgramBundle\Test\Service;

use Src\FidelityProgramBundle\Repository\PointsRepository;
use PHPUnit\Framework\TestCase;
use Src\FidelityProgramBundle\Service\FidelityProgramService;
use Src\FidelityProgramBundle\Service\PointsCalculator;
use Src\OrderBundle\Entity\Customer;

class FidelityProgramServiceTest extends TestCase
{
    public function test_save_points_when_has_points_to_receive()
    {
        $pointCalculator = $this->createMock(PointsCalculator::class);
        $pointCalculator->method('calculatePointsToReceive')->willReturn(100);

        $pointRepository = $this->createMock(PointsRepository::class);
        $pointRepository->expects($this->once())->method('save');

        $customer = $this->createMock(Customer::class);

        $fidelityProgramService = new FidelityProgramService($pointRepository, $pointCalculator);

        $fidelityProgramService->addPoints($customer, 50);
    }

    public function test_dont_save_points_when_has_no_points_to_receive()
    {
        $pointCalculator = $this->createMock(PointsCalculator::class);
        $pointCalculator->method('calculatePointsToReceive')->willReturn(0);

        $pointRepository = $this->createMock(PointsRepository::class);
        $pointRepository->expects($this->never())->method('save');

        $customer = $this->createMock(Customer::class);

        $fidelityProgramService = new FidelityProgramService($pointRepository, $pointCalculator);

        $fidelityProgramService->addPoints($customer, 50);
    }
}
