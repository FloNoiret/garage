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
        $comments = $repository->findBy([],['id' => 'DESC']);
        return $this->render('home_page/home.html.twig', [
            "comments" => $comments
        ]);
    }
}