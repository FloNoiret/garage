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

        // user Password Hasher 
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {

        $adminUser = new User($this->passwordHasher);
        $adminUser->setUsername($_ENV['ADMIN_ID'])->setPassword($_ENV['ADMIN_PASSWORD'])->setRoles(array('ROLE_ADMIN'));
        $manager->persist($adminUser);

        $manager->flush();
    }
}