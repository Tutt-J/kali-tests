<?php

namespace App\Tests\Entity;

use App\Entity\User;
use App\Entity\Order;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class OrderTest extends KernelTestCase{
    public function testOrderEntity(){
        $user = new User();
        $user->setEmail("j.doe@mail.com");

        $order=new Order();
        $order->setNumber("ABC_123_12");
        $order->setTotalPrice(449.99);
        $order->setUser($user);

        $this->assertEquals("ABC_123_12", $order->getNumber());
        $this->assertEquals(449.99, $order->getTotalPrice());
        $this->assertEquals("j.doe@mail.com", $order->getUser()->getEmail());
    }
}