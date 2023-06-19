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

     /* Route & Controller to view*/
    #[Route('/time', name: 'time')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(TimeTable::class);
        $timetables = $repository->findAll();
        return $this->render('time/time.html.twig', [
            "timetables" => $timetables
        ]);
    }

    /* Route & Controller to get data*/
    #[Route('/timetable')]
    public function create(Request $request, ManagerRegistry $doctrine): Response
    {
        $this->denyAccessUnlessGranted("ROLE_ADMIN");
        $timetable = new TimeTable();
        $timetable_form = $this->createForm(TimeTableType::class, $timetable);
        $timetable_form->handleRequest($request);

        if ($timetable_form->isSubmitted() && $timetable_form->isValid()) {
            $entityManager = $doctrine->getManager();
            $entityManager->persist($timetable);
            $entityManager->flush();
            return $this->redirectToRoute("time");
        }
        return $this->render('time/index.html.twig', [
            "timetable_form" => $timetable_form->createView()
        ]);
    }

     /* Route & Controller to modify data*/
}
