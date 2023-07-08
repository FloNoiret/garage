<?php

namespace App\Controller;

use App\Entity\Service;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class HomePageController extends AbstractController
{

    // View Service data
    #[Route('/', name: 'accueil')]
    public function viewService(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(Service::class);
        $services = $repository->findAll();
        return $this->render('home_page/home.html.twig', [
            "services" => $services
        ]);
    }
}
