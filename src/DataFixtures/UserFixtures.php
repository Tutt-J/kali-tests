<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    public function __construct(private UserPasswordHasherInterface $userPasswordHasher) {}

    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user->setEmail('j.doe@mail.com');
        $user->setFirstname("John");
        $user->setLastname("Doe");
        $user->setPassword($this->userPasswordHasher->hashPassword($user, "azerty"));

        $manager->persist($user);

        $manager->flush();
    }
}
