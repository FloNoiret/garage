<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DedicatedUserPageController extends AbstractController
{
    
    #[Route('/user/page', name: 'dedicated_user_page')]
    public function index(): Response
    {
        $this->denyAccessUnlessGranted("IS_AUTHENTICATED_FULLY");
        return $this->render('dedicated_user_page/index.html.twig', [
            'controller_name' => 'DedicatedUserPageController',
        ]);
    }
}
