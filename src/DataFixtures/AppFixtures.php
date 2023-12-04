<?php

namespace App\DataFixtures;

use App\Entity\Service;
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

        // Services creation

        $servicesData = [
            [
                'title' => "Diagnostic de l'état général du véhicule",
                'content' => "Vérification globale de l'état de votre voiture pour identifier les éventuels problèmes ou dysfonctionnements."
            ],
            [
                'title' => "Vidange et remplacement de l'huile moteur",
                'content' => "Élimination de l'huile usagée et remplacement par de l'huile neuve pour assurer la lubrification optimale du moteur."
            ],
            [
                'title' => "Contrôle et réglage de la pression des pneus",
                'content' => "Vérification et ajustement de la pression des pneus pour assurer une conduite sûre et prévenir une usure inégale des pneus."
            ],
            [
                'title' => "Vérification et rechargement du liquide de refroidissement",
                'content' => "Inspection et remplissage du liquide de refroidissement pour éviter la surchauffe du moteur."
            ],
            [
                'title' => "Contrôle et recharge du liquide de frein",
                'content' => "Vérification et ajout de liquide de frein pour garantir un freinage efficace et sécurisé."
            ],
            [
                'title' => "Contrôle et changement des ampoules défectueuses",
                'content' => "Inspection et remplacement des ampoules défectueuses pour un éclairage correct de la voiture."
            ],
        ];

        foreach ($servicesData as $serviceData) {
            $service = new Service();
            $service->setTitle($serviceData['title'])
                ->setContent($serviceData['content']);
            $manager->persist($service);
        }

        $manager->flush();
    }
}
