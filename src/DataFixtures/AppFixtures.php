<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        
        $parrot = new User($this->passwordHasher);
        $parrot->setUsername("Parrot")-> setPassword("admin")-> setRoles(array('ROLE_ADMIN'));
        $manager->persist($parrot);

        $manager->flush();
    }
}