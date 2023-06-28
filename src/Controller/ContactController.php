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

    #[Route('/contact/message', name: 'message')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $this->denyAccessUnlessGranted("IS_AUTHENTICATED_FULLY");
        $repository = $doctrine->getRepository(Contact::class);
        $contacts = $repository->findBy([], ['id' => 'DESC']);
        return $this->render('contact/contact.html.twig', [
            "contacts" => $contacts
        ]);
    }


    /* Write a message*/
    #[Route('/contact', name: 'contact')]
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

    /* Delete message */
    #[Route('/contact/delete/{id<\d+>}', name: 'delete-message')]
    public function delete(Contact $contact, ManagerRegistry $doctrine): Response
    {
        $this->denyAccessUnlessGranted("IS_AUTHENTICATED_FULLY");
        $entityManager = $doctrine->getManager();
        $entityManager->remove($contact);
        $entityManager->flush();
        return $this->redirectToRoute("contact");
    }
}
