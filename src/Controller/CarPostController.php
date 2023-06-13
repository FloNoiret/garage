<?php

namespace App\Controller;

use App\Entity\CarPost;
use App\Form\CarPostType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CarPostController extends AbstractController
{
    /* Route & Controller to view car post */
    #[Route('/vehicules', name: 'vehicules')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(CarPost::class);
        $carposts = $repository->findAll();
        return $this->render('car_post/car.html.twig', [
            "carposts" => $carposts
        ]);
    }

    /* Route & Controller to create car post */
    #[Route('/vehicules/new', name: 'AddVehicule')]
    public function create(Request $request, ManagerRegistry $doctrine): Response
    {
        $carpost = new CarPost();
        $form = $this->createForm(CarPostType::class, $carpost);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $doctrine->getManager();    /* Recupération instance entity manager */
            $entityManager->persist($carpost); /* Ajout objet à entity manager */
            $entityManager->flush(); /* Synchronisation BDD */
        }
        return $this->render('car_post/form.html.twig', [
            "car_post_form" => $form->createView()
        ]);
    }

    /* Delete a car post */
    #[Route('/vehicules/delete/{id<\d+>}', name: 'delete-vehicule')]
    public function delete(CarPost $carpost, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $entityManager->remove($carpost);
        $entityManager->flush();
        return $this->redirectToRoute("vehicules");
    }
}
