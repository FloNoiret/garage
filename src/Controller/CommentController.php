<?php

namespace App\Controller;

use App\Entity\CommentPost;
use App\Form\CommentApprovalType;
use App\Form\CommentType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class CommentController extends AbstractController
{

    #[Route('/comment', name: 'comment')]
    public function index(ManagerRegistry $doctrine): Response
    {
        /* View all comment */
        $this->denyAccessUnlessGranted("IS_AUTHENTICATED_FULLY");
        $repository = $doctrine->getRepository(CommentPost::class);
        $comments = $repository->findBy([],['id' => 'DESC']);
        return $this->render('comment/comment.html.twig', [
            "comments" => $comments
        ]);
    }

    /* Create comment */
    #[Route('/comment/new')]
    public function createComment(Request $request, ManagerRegistry $doctrine): Response
    {
        $comment = new CommentPost();
        $comment_form = $this->createForm(CommentType::class, $comment);
        $comment_form->handleRequest($request);

        if ($comment_form->isSubmitted() && $comment_form->isValid()) {
            $entityManager = $doctrine->getManager();
            $entityManager->persist($comment);
            $entityManager->flush();
            return $this->redirectToRoute("thank_you");
        }
        return $this->render('comment/commentform.html.twig', [
            "comment_form" => $comment_form->createView()
        ]);
    }

    /* Delete comment */
    #[Route('/comment/delete/{id<\d+>}', name: 'delete-comment')]
    public function deleteComment(CommentPost $comment, ManagerRegistry $doctrine): Response
    {
        $this->denyAccessUnlessGranted("IS_AUTHENTICATED_FULLY");
        $entityManager = $doctrine->getManager();
        $entityManager->remove($comment);
        $entityManager->flush();
        return $this->redirectToRoute("comment");
    }

    /* Approve comment */
    #[Route('/comment/approval/{id<\d+>}', name: "approve-comment")]
    public function approveComment(Request $request, CommentPost $comment, ManagerRegistry $doctrine): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $comment_approval_form = $this->createForm(CommentApprovalType::class, $comment);
        $comment_approval_form->handleRequest($request);
        if ($comment_approval_form->isSubmitted() && $comment_approval_form->isValid()) {
            $em = $doctrine->getManager();
            $em->flush();
            return $this->redirectToRoute("comment");
        }
        return $this->render('comment/commentapproval.html.twig', [
            "comment_approval_form" => $comment_approval_form->createView()
        ]);
    }
}