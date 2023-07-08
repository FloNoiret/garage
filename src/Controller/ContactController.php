<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactProcessedType;
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
    public function viewDemand(ManagerRegistry $doctrine): Response
    {
        $this->denyAccessUnlessGranted("IS_AUTHENTICATED_FULLY");
        $repository = $doctrine->getRepository(Contact::class);
        $contacts = $repository->findBy([], ['id' => 'DESC']);
        return $this->render('contact/contact.html.twig', [
            "contacts" => $contacts
        ]);
    }

    /* Processed Demands*/

    #[Route('/contact/processed/{id<\d+>}', name: "processed-demand")]
    public function updateMessage(Request $request, Contact $contact, ManagerRegistry $doctrine): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $contact_processed_form = $this->createForm(ContactProcessedType::class, $contact);
        $contact_processed_form->handleRequest($request);
        if ($contact_processed_form->isSubmitted() && $contact_processed_form->isValid()) {
            $em = $doctrine->getManager();
            $em->flush();
            return $this->redirectToRoute("message");
        }
        return $this->render('contact/contactprocessed.html.twig', [
            "contact_processed_form" => $contact_processed_form->createView()
        ]);
    }

    /* Write a message*/
    #[Route('/contact', name: 'contact')]
    public function renderDemand(Request $request): Response
    {
        $contact_form = $this->createForm(ContactType::class);

        return $this->render('contact/form.html.twig', [
            'contact_form' => $contact_form->createView(),
        ]);
    }


    #[Route('/process_contact', name: 'process_contact', methods: ["POST"])]
    public function processDemand(Request $request, ManagerRegistry $doctrine): Response
    {
        $contact = new Contact();
        $contact_form = $this->createForm(ContactType::class, $contact);
        $contact_form->handleRequest($request);

        if ($contact_form->isSubmitted() && $contact_form->isValid()) {
            $entityManager = $doctrine->getManager();
            $entityManager->persist($contact);
            $entityManager->flush();


            return $this->redirectToRoute('thank_you');
        }

        return $this->render('contact/form.html.twig', [
            'contact_form' => $contact_form->createView(),
        ]);
    }
    /* Delete message */
    #[Route('/contact/delete/{id<\d+>}', name: 'delete-message')]
    public function deleteMessage(Contact $contact, ManagerRegistry $doctrine): Response
    {
        $this->denyAccessUnlessGranted("IS_AUTHENTICATED_FULLY");
        $entityManager = $doctrine->getManager();
        $entityManager->remove($contact);
        $entityManager->flush();
        return $this->redirectToRoute("message");
    }

    /* Thank You for your Message*/
    #[Route('/merci', name: 'thank_you')]
    public function ThankYou(): Response
    {
        return $this->render('contact/thankyoupage.html.twig', [
            'thankyou' => 'ThankYouController',
        ]);
    }
}
