<?php

namespace App\Tests\Service;

use App\Entity\Product;
use App\Service\Calculator;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class CalculatorTest extends KernelTestCase
{
    private $calculator;

    protected function setUp(): void
    {
        $this->calculator = new Calculator();
    }

    public function testGetTotalHT()
    {
        $result = $this->calculator->getTotalHT($this->getProducts());

        $this->assertEquals(101, $result);
    }

    public function testGetTotalTTC()
    {
        $result = $this->calculator->getTotalTTC($this->getProducts(), 20);

        $this->assertEquals(121.2, $result);
    }

    public function getProducts()
    {
        return [
            [
                'product' => $this->createProduct("Ballon rouge", 10),
                'quantity' => 3
            ],
            [
                'product' => $this->createProduct("Ballon bleu", 8),
                'quantity' => 2
            ],
            [
                'product' => $this->createProduct("Ballon jaune", 11),
                'quantity' => 5
            ]
        ];
    }

    public function createProduct($name, $price)
    {
        return ((new Product())
            ->setName($name)
            ->setPrice($price));
    }
}
