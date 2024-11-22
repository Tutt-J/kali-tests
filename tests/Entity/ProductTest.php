<?php

namespace App\Tests\Entity;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ProductTest extends KernelTestCase
{
    public function testProductEntity()
    {
        $product = new Product();
        $product->setName("Shoes");
        $product->setPrice(19.99);

        $this->assertEquals("Shoes", $product->getName());
        $this->assertEquals(19.99, $product->getPrice());
    }
}
