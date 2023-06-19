<?php

namespace App\Controller;

use App\Entity\TimeTable;
use App\Form\TimeTableType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TimeController extends AbstractController
{
    #[Route('/time', name: 'time')]
    public function index(ManagerRegistry $doctrine): Response
    {
        /* Route & Controller comment */
        $repository = $doctrine->getRepository(TimeTableType::class);
        $timetable = $repository->findAll();
        return $this->render('time/timetable.html.twig', [
            "timetable" => $timetable
        ]);
    }
    #[Route('/timetable')]
    public function create(Request $request, ManagerRegistry $doctrine): Response
    {
        $timetable = new TimeTable();
        $timetable_form = $this->createForm(TimeTableType::class, $timetable);
        $timetable_form->handleRequest($request);

        if ($timetable_form->isSubmitted() && $timetable_form->isValid()) {
            $entityManager = $doctrine->getManager();
            $entityManager->persist($timetable);
            $entityManager->flush();
            return $this->redirectToRoute("timetable");
        }
        return $this->render('time/index.html.twig', [
            "timetable_form" => $timetable_form->createView()
        ]);
    }
}
