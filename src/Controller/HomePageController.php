<?php

namespace App\Controller;

use App\Entity\CommentPost;
use App\Form\CommentType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class HomePageController extends AbstractController
{

    #[Route('/', name: 'accueil')]
    public function index(ManagerRegistry $doctrine): Response
    {
        /* Route & Controller comment */
        $repository = $doctrine->getRepository(CommentPost::class);
        $comments = $repository->findAll();
        return $this->render('home_page/home.html.twig', [
            "comments" => $comments
        ]);
    }

    #[Route('/comment/new')]
    public function create(Request $request, ManagerRegistry $doctrine): Response
    {
        $comment = new CommentPost();
        $comment_form = $this->createForm(CommentType::class, $comment);
        $comment_form->handleRequest($request);

        if ($comment_form->isSubmitted() && $comment_form->isValid()) {
            $entityManager = $doctrine->getManager();
            $entityManager->persist($comment);
            $entityManager->flush();
            return $this->redirectToRoute("accueil");
        }
        return $this->render('home_page/commentform.html.twig', [
            "comment_form" => $comment_form->createView()
        ]);
    }

    #[Route('/comment/delete/{id<\d+>}', name: 'delete-comment')]
    public function delete(CommentPost $comment, ManagerRegistry $doctrine): Response
    {
        $this->denyAccessUnlessGranted("IS_AUTHENTICATED_FULLY");
        $entityManager = $doctrine->getManager();
        $entityManager->remove($comment);
        $entityManager->flush();
        return $this->redirectToRoute("accueil");
    }
}
