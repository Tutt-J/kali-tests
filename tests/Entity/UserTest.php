<?php

namespace App\Tests\Entity;

use App\Entity\User;
use App\Entity\Order;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class UserTest extends KernelTestCase
{
    public function testUserEntity()
    {
        $user = new User();
        $user->setLastname("Doe");
        $user->setFirstname("John");
        $user->setEmail("j.doe@mail.com");
        $user->setPassword("password");
        $user->setRoles(["ROLE_ADMIN"]);

        $this->assertEquals("Doe", $user->getLastname());
        $this->assertEquals("John", $user->getFirstname());
        $this->assertEquals("j.doe@mail.com", $user->getEmail());
        $this->assertEquals("j.doe@mail.com", $user->getUserIdentifier());
        $this->assertEquals("password", $user->getPassword());
        $this->assertContains("ROLE_ADMIN", $user->getRoles());
        $this->assertContains("ROLE_USER", $user->getRoles());
    }

    public function testAddRemoveOrder()
    {
        $user = new User();

        $order = new Order();
        $order->setNumber("XYZ_456_ABC");

        $user->addOrder($order);

        $containsOrderWithNumber = false;
        foreach ($user->getOrders() as $existingOrder) {
            if ($existingOrder->getNumber() === "XYZ_456_ABC") {
                $containsOrderWithNumber = true;
                break;
            }
        }
        $this->assertTrue($containsOrderWithNumber, "L'utilisateur ne contient pas de commande avec le numéro attendu.");

        $user->removeOrder($order);
        $this->assertNotContains($order, $user->getOrders());
    }
}
