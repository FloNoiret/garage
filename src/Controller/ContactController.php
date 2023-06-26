<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /* view contact demand */
    #[Route('/contact', name: 'contact')]
    public function index(): Response
    {
        return $this->render('contact/contact.html.twig', [
            'controller_name' => 'ContactController',
        ]);
    }


    /* Write a message*/
    #[Route('/contact/new')]
    public function create(Request $request, ManagerRegistry $doctrine): Response
    {
        $contact = new Contact();
        $contact_form = $this->createForm(ContactType::class, $contact);
        $contact_form->handleRequest($request);

        if ($contact_form->isSubmitted() && $contact_form->isValid()) {
            $entityManager = $doctrine->getManager();
            $entityManager->persist($contact);
            $entityManager->flush();
            return $this->redirectToRoute("contact");
        }
        return $this->render('contact/form.html.twig', [
            "contact_form" => $contact_form->createView()
        ]);
    }
}
