<?php

namespace App\Controller;

use App\Entity\CarPost;
use App\Form\CarPostType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CarPostController extends AbstractController
{
    /* View car post */
    #[Route('/vehicules', name: 'vehicules')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(CarPost::class);
        $carposts = $repository->findAll();
        return $this->render('car_post/car.html.twig', [
            "carposts" => $carposts
        ]);
    }

    /* create car post */
    #[Route('/vehicules/new', name: 'AddVehicule')]
    public function create(Request $request, ManagerRegistry $doctrine): Response
    {
        $this->denyAccessUnlessGranted("IS_AUTHENTICATED_FULLY");
        $carpost = new CarPost();
        $form = $this->createForm(CarPostType::class, $carpost);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $path = $this->getParameter('kernel.project_dir') . '/public/assets/CarImage';
            /* Recupération des valeurs en objet CarPost */
            $entityManager = $doctrine->getManager();    /* Recupération instance entity manager */

            /* Récuperation de l'image */
            $image = $carpost->getImage();

            /* Récuperation du file soumis */
            $file = $image->getFile();

            /* Creation nom unique */
            $name =  md5(uniqid()) . '.' . $file->guessExtension();

            /* Deplace le fichier */
            $file->move($path, $name);


            /* Donne le nom à l'image */
            $image->setName($name);

            /* Ajout objet à entity manager */
            $entityManager->persist($carpost);

            /* Synchronisation BDD */
            $entityManager->flush();
            return $this->redirectToRoute("vehicules");
        }
        return $this->render('car_post/form.html.twig', [
            "car_post_form" => $form->createView()
        ]);
    }

    /* Delete a car post */
    #[Route('/vehicules/delete/{id<\d+>}', name: 'delete-vehicule')]
    public function delete(CarPost $carpost, ManagerRegistry $doctrine): Response
    {
        $this->denyAccessUnlessGranted("IS_AUTHENTICATED_FULLY");
        $entityManager = $doctrine->getManager();
        $entityManager->remove($carpost);
        $entityManager->flush();
        return $this->redirectToRoute("vehicules");
    }

    /* Filtered car post */
    #[Route('/vehicules/filtered', name: 'car_list_filtered')]
    public function carListFilteredAction(Request $request, ManagerRegistry $doctrine)
    {
        $repository = $doctrine->getRepository(CarPost::class);
        $carposts = $repository->findAll(); //Get Car Data 

        $minPrice = $request->request->get('min_price');
        $maxPrice = $request->request->get('max_price');
        $minKilometer = $request->request->get('min_kilometer');
        $maxKilometer = $request->request->get('max_kilometer');

        // Filter cars with price
        if ($minPrice !== null) {
            $carposts = array_filter($carposts, function ($carpost) use ($minPrice) {
                return $carpost->getPrice() >= $minPrice;
            });
        }

        if ($maxPrice !== null) {
            $carposts = array_filter($carposts, function ($carpost) use ($maxPrice) {
                return $carpost->getPrice() <= $maxPrice;
            });
        }

        if ($minKilometer !== null) {
            $carposts = array_filter($carposts, function ($carpost) use ($minKilometer) {
                return $carpost->getKilometer() >= $minKilometer;
            });
        }

        if ($maxKilometer !== null) {
            $carposts = array_filter($carposts, function ($carpost) use ($maxKilometer) {
                return $carpost->getKilometer() <= $maxKilometer;
            });
        }
        // Send the HTML filtered
        $html = $this->renderView('car_post/car_list_filtered.html.twig', [
            'carposts' => $carposts,
        ]);

        return new Response($html);
    }
}
