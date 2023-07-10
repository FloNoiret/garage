<?php

namespace App\Controller;

use App\Entity\CarPost;
use App\Entity\Characteristic;
use App\Entity\Equipment;
use App\Entity\Picture;
use App\Form\EquipmentType;
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
    public function viewCar(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(CarPost::class);
        $carposts = $repository->findAll();
        return $this->render('car_post/car.html.twig', [
            "carposts" => $carposts
        ]);
    }

    /* create car post */
    #[Route('/vehicules/new', name: 'AddVehicule')]
    public function createCar(Request $request, ManagerRegistry $doctrine): Response
    {
        $this->denyAccessUnlessGranted("IS_AUTHENTICATED_FULLY");
        $carpost = new CarPost();

        $equipment1 = new Equipment();
        $equipment2 = new Equipment();

        $carpost->addEquipment($equipment1);
        $carpost->addEquipment($equipment2);

        $characteristic1 = new Characteristic();
        $characteristic2 = new Characteristic();

        $carpost->addCharacteristic($characteristic1);
        $carpost->addCharacteristic($characteristic2);

        $form = $this->createForm(CarPostType::class, $carpost);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /* Image Principale */
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

            // Get the uploaded pictures from the form
            $pictures = $form->get('picture')->getData();

            // Process and persist each picture
            foreach ($pictures as $uploadedFile) {
                /* Image Principale */
                $pathPicture = $this->getParameter('kernel.project_dir') . '/public/assets/CarImage/Gallery';

                /* Recupération des valeurs en objet CarPost */
                $entityManager = $doctrine->getManager();

                // Create a new Picture entity
                $newPicture = new Picture();

                // Set the CarPost for the picture
                $newPicture->setCarPost($carpost);

                /* Récuperation du file soumis */
                $fichier = $uploadedFile->getClientOriginalName();

                // Process the picture file (e.g., move it to a directory, generate thumbnails, etc.)
                $title = md5(uniqid(rand(), true)) . '.webp';

                /* Deplace le fichier */
                $uploadedFile->move($pathPicture, $title);

                /* Donne le nom à l'image */
                $newPicture->setTitle($title);

                // Set the file for the uploaded picture
                $newPicture->setFichier($uploadedFile);

                // Add the picture to the CarPost's collection of pictures
                $carpost->addPicture($newPicture);

                // Persist the Picture entity
                $entityManager->persist($newPicture);
            }

            // Flush the Picture entities to save them in the database
            $entityManager->persist($carpost);
            // Persist and flush the Picture entities
            $entityManager->persist($newPicture);
            $entityManager->flush();
            return $this->redirectToRoute('vehicules');
        }

        return $this->render('car_post/form.html.twig', [
            "car_post_form" => $form->createView()
        ]);
    }

    /* Delete a car post */
    #[Route('/vehicules/delete/{id<\d+>}', name: 'delete-vehicule')]
    public function deleteCar(CarPost $carpost, ManagerRegistry $doctrine): Response
    {
        $this->denyAccessUnlessGranted("ROLE_ADMIN");
        $entityManager = $doctrine->getManager();
        $entityManager->remove($carpost);
        $entityManager->flush();
        return $this->redirectToRoute("vehicules");
    }

    /*  Modify Carpost*/
    #[Route('/vehicule/edit/{id<\d+>}', name: "edit-vehicule")]
    public function updateCar(Request $request, CarPost $carpost, ManagerRegistry $doctrine): Response
    {
        $this->denyAccessUnlessGranted("ROLE_ADMIN");
        $form = $this->createForm(CarPostType::class, $carpost);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $doctrine->getManager();
            $em->flush();
            return $this->redirectToRoute("vehicules");
        }
        return $this->render('car_post/form.html.twig', [
            "car_post_form" => $form->createView()
        ]);
    }

    /* Filtered car post */
    #[Route('/vehicules/filtered', name: 'car_list_filtered')]
    public function carListFilteredAction(Request $request, ManagerRegistry $doctrine)
    {
        $repository = $doctrine->getRepository(CarPost::class);
        $carposts = $repository->findAll(); //Get Car Data 
        // $minPrice = $request->request->get('min_price');
        $maxPrice = $request->request->get('max_price');
        //  $minKilometer = $request->request->get('min_kilometer');
        $maxKilometer = $request->request->get('max_kilometer');

        $minDate = $request->request->get('min_date');

        // Filter cars with price
        //  if ($minPrice !== null) {
        //    $carposts = array_filter($carposts, function ($carpost) use ($minPrice) {
        //        return $carpost->getPrice() >= $minPrice;
        //     });
        //   }

        if ($minDate !== null) {
            $carposts = array_filter($carposts, function ($carpost) use ($minDate) {
                return $carpost->getDate() >= $minDate;
            });
        }

        if ($maxPrice !== null) {
            $carposts = array_filter($carposts, function ($carpost) use ($maxPrice) {
                return $carpost->getPrice() <= $maxPrice;
            });
        }

        //   if ($minKilometer !== null) {
        //      $carposts = array_filter($carposts, function ($carpost) use ($minKilometer) {
        //          return $carpost->getKilometer() >= $minKilometer;
        //       });
        //    }

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
