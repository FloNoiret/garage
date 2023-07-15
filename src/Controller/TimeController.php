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
    /* Route & Controller to get first data 
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
            return $this->redirectToRoute("accueil");
        }
        return $this->render('time/form.html.twig', [
            "timetable_form" => $timetable_form->createView()
        ]);
    }*/

    /*  Modify data*/
    #[Route('/time/edit/{id<\d+>}', name: "edit-time")]
    public function updateTimeTable(Request $request, TimeTable $timetable, ManagerRegistry $doctrine): Response
    {
        $this->denyAccessUnlessGranted("ROLE_ADMIN");
        $timetable_form = $this->createForm(TimeTableType::class, $timetable);
        $timetable_form->handleRequest($request);
        if ($timetable_form->isSubmitted() && $timetable_form->isValid()) {
            $em = $doctrine->getManager();
            $em->flush();
            return $this->redirectToRoute("accueil");
        }
        return $this->render('time/form.html.twig', [
            "timetable_form" => $timetable_form->createView()
        ]);
    }
}
