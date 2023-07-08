<?php

namespace App\Controller;

use App\Entity\Service;
use App\Form\ServiceType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ServiceController extends AbstractController
{

    /* Route & Controller to add a service*/
    #[Route('/service/new')]
    public function createService(Request $request, ManagerRegistry $doctrine): Response
    {
        $this->denyAccessUnlessGranted("ROLE_ADMIN");
        $service = new Service();
        $service_form = $this->createForm(ServiceType::class, $service);
        $service_form->handleRequest($request);

        if ($service_form->isSubmitted() && $service_form->isValid()) {
            $entityManager = $doctrine->getManager();
            $entityManager->persist($service);
            $entityManager->flush();
            return $this->redirectToRoute("accueil");
        }
        return $this->render('service/form.html.twig', [
            "service_form" => $service_form->createView()
        ]);
    }

    /*  Modify data*/
    #[Route('/service/edit/{id<\d+>}', name: "edit-service")]
    public function updateService(Request $request, Service $service, ManagerRegistry $doctrine): Response
    {
        $this->denyAccessUnlessGranted("ROLE_ADMIN");
        $service_form = $this->createForm(ServiceType::class, $service);
        $service_form->handleRequest($request);
        if ($service_form->isSubmitted() && $service_form->isValid()) {
            $em = $doctrine->getManager();
            $em->flush();
            return $this->redirectToRoute("accueil");
        }
        return $this->render('service/form.html.twig', [
            "service_form" => $service_form->createView()
        ]);
    }

     /* Delete a service */
     #[Route('/service/delete/{id<\d+>}', name: 'delete-service')]
     public function deleteService(Service $service, ManagerRegistry $doctrine): Response
     {
         $this->denyAccessUnlessGranted("IS_AUTHENTICATED_FULLY");
         $entityManager = $doctrine->getManager();
         $entityManager->remove($service);
         $entityManager->flush();
         return $this->redirectToRoute("accueil");
     }
}
