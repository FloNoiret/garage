<?php

namespace App\DataFixtures;

use App\Entity\TimeTable;
use App\Entity\User;
use DateTime;
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
        // User admin creation
        $adminUser = new User($this->passwordHasher);
        $adminUser->setUsername($_ENV['ADMIN_ID'])->setPassword($_ENV['ADMIN_PASSWORD'])->setRoles(array('ROLE_ADMIN'));
        $manager->persist($adminUser);

        // Timetable creation
        $timetable = new TimeTable();
        $timetable
        ->setMondayAM(new \DateTime('08:00:00'))
        ->setClosemondayAM(new \DateTime('12:00:00'))
        ->setMondayPM(new \DateTime('14:00:00'))
        ->setClosemondayPM(new \DateTime('18:00:00'))

        ->setTuesdayAM(new \DateTime('08:00:00'))
        ->setClosetuesdayAM(new \DateTime('12:00:00'))
        ->setTuesdayPM(new \DateTime('14:00:00'))
        ->setClosetuesdayPM(new \DateTime('18:00:00'))

        ->setWednesdayAM(new \DateTime('07:30:00'))
        ->setClosewednesdayAM(new \DateTime('12:30:00'))
        ->setWednesdayPM(new \DateTime('13:00:00'))
        ->setClosewednesdayPM(new \DateTime('19:00:00'))

        ->setThursdayAM(new \DateTime('08:00:00'))
        ->setClosethursdayAM(new \DateTime('12:00:00'))
        ->setThursdayPM(new \DateTime('14:00:00'))
        ->setClosethursdayPM(new \DateTime('18:00:00'))

        ->setFridayAM(new \DateTime('07:30:00'))
        ->setClosefridayAM(new \DateTime('12:30:00'))
        ->setFridayPM(new \DateTime('13:00:00'))
        ->setClosefridayPM(new \DateTime('20:00:00'))

        ->setSaturdayAM(new \DateTime('07:00:00'))
        ->setClosesaturdayAM(new \DateTime('12:30:00'))
        ->setSaturdayPM(new \DateTime('13:00:00'))
        ->setClosesaturdayPM(new \DateTime('20:00:00'))

        ->setSundayAM(new \DateTime('00:00:00'))
        ->setClosesundayAM(new \DateTime('00:00:00'))
        ->setSundayPM(new \DateTime('00:00:00'))
        ->setCloseSundayPM(new \DateTime('00:00:00'));

        $manager->persist($timetable);

        $manager->flush();
    }
}
