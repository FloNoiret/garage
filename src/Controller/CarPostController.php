<?php

namespace App\Controller;

use App\Entity\CarPost;
use App\Form\CarPostType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CarPostController extends AbstractController
{
    /* Route & Controller to view car post */
    #[Route('/vehicules', name: 'vehicule')]
    public function index(): Response
    {
        return $this->render('car_post/car.html.twig');
    }

    /* Route & Controller to create car post */
    #[Route('/vehicules/new', name: 'AddVehicule')]
    public function create(Request $request): Response
    {
        $carpost = new CarPost();
        $form = $this->createForm(CarPostType::class, $carpost);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
        }
        return $this->render('car_post/form.html.twig', [
            "car_post_form" => $form->createView()
        ]);
    }
}
