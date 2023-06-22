<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NotFoundController extends AbstractController
{
    #[Route('/404', name: '404')]
    public function index(): Response
    {
        return $this->render('not_found/404.html.twig', [
            'controller_name' => 'NotFoundController',
        ]);
    }
}
