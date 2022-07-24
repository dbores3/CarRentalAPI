<?php

declare(strict_types=1);
namespace OSCARAPI\Tests\Unit\Domain;

use PHPUnit\Framework\TestCase;
use models\Car;


class CarTest extends TestCase
{
    public function testShouldAddCarsWithSuccess(): void
    {
        //Given
        $car = $this->createMock(Car::class);
        //$order = new Order($shop);
        //$chocolate = new Product('Chocolate', 2);

        //Then
//        $shop = new Shop();
        
        /*//When
        $order->addProduct($chocolate);

        //Then
        self::assertSame($chocolate, $order->getProductByName('Chocolate'));*/
    }
}
