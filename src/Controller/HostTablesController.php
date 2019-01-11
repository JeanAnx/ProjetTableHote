<?php

namespace App\Controller;

use App\Entity\Bookings;
use App\Entity\HostTables;
use App\Entity\Hours;
use App\Form\BookingsFormType;
use App\Form\HostTablesSearchType;
use App\Form\HostTablesType;
use App\Repository\HostTablesRepository;
use App\Repository\HoursRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints\DateTime;

class HostTablesController extends AbstractController
{
    /**
     * @Route("/tables", name="host_tables_index", methods={"GET"})
     */
    public function index(HostTablesRepository $hostTablesRepository, Request $request): Response
    {

// Création d'un tableau vide de critères de recherche

        $searchParams = [];

// Récupération données du formulaire en GET depuis la requête

        $formData = $request->query->get('data');

        dump($formData);

// Si une ville a été envoyée via le formulaire, on fait une recherche en base de données avec findBy en lui passant un tableau de paramètres de recherche

        if (!empty($formData['city'])) {
            $searchParams['city'] = $formData['city'];
        }

// À chaque fois qu'un champ est renseigné, on alimente le tableau des paramètres

// J'isole le "CookStyle" pour pouvoir l'envoyer eu template et faire un tri dans le twig directement

        $cookStyle = null;

        if (!empty($formData['cook_style'])) {
            $cookStyle = $formData['cook_style'];
        }

        if (!empty($formData['vege']) && $formData['vege'] == true) {
            $searchParams['vege'] = true;
        }

        if (!empty($formData['vegan']) && $formData['vegan'] == true) {
            $searchParams['vegan'] = true;
        }

        if (!empty($formData['sansgluten']) && $formData['sansgluten'] == true) {
            $searchParams['gluten'] = true;
        }

        dump($searchParams);


// Si aucun champ n'a été renseigné, les params sont vides, et on balance tous les restaurants

        return $this->render(
                'host_tables/index.html.twig',
                [
                    'host_tables' => $hostTablesRepository->findBy($searchParams),
                    'all_tables' => $hostTablesRepository->findAll(),
                    'cookStyle' => $cookStyle
                ]);

    }


    /**
     * @Route("/tables/search", name="host_tables_search", methods={"GET","POST"})
     */

    public function search(HostTablesRepository $hostTablesRepository , Request $request)
    {

        $searchString = $request->get('table');
        dump($searchString);

        //$hostTablesRepository->searchbar('La Marée des Crustacés');
        return $this->render(
            'host_tables/search.html.twig',
            [
                'host_tables' => $hostTablesRepository->searchbar($searchString),
                'all_tables' => $hostTablesRepository->findAll()
            ]);
    }


    /**
     * @Route("admin/tables/new", name="host_tables_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $hostTable = new HostTables();
        $form = $this->createForm(HostTablesType::class, $hostTable);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($hostTable);
            $entityManager->flush();

            return $this->redirectToRoute('host_tables_index');
        }

        return $this->render('host_tables/new.html.twig', [
            'host_table' => $hostTable,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @param HostTables $hostTable
     * @param HoursRepository $hoursRepository
     * @param HostTablesRepository $hostTablesRepository
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/tables/{id}", name="host_tables_show", methods={"GET","POST"})
     */
    public function show(HostTables $hostTable, HoursRepository $hoursRepository, HostTablesRepository $hostTablesRepository, Request $request, EntityManagerInterface $entityManager)
    {
        $hours = $hoursRepository->findBy(
            ['hostTable' => $hostTable]
        );


        $bookingForm = $this->createForm(BookingsFormType::class);
        $bookingForm->handleRequest($request);

        $nbConvives = 1;

        if ($bookingForm->isSubmitted() && $bookingForm->isValid()) {

            $nbConvives = $bookingForm->getData();
            dump($nbConvives);
            // J'envoie les données envoyés par le form dans une variable bookingData ( + lisible ?)

            $bookingData = $bookingForm->getData();

            // Je tente de construite un objet DateTime avec la date et l'heure envoyés (C'est pas gagné)

            /** @var \DateTime $dateBooking */
            $dateBooking = $bookingData['date'];
            $dateBooking->setTime( $bookingData['heure']->format('H') , $bookingData['heure']->format('i') );
            dump($dateBooking);


            // Tentative de redirection vers page login si utilisateur pas connecté

            if ($this->getUser()) {

                $newBooking = new Bookings();
                $newBooking
                    ->setClient($this->getUser())
                    ->setDate($dateBooking)
                    ->setHostTable($hostTable)
                    ->setName($hostTable->getName())
                    ->setSeats($bookingData['nb_convives'])
                    ->setHealth([]);

                dump($newBooking);

                $entityManager->persist($newBooking);
                $entityManager->flush();

                $this->addFlash('success', ' Votre commande a bien été enregistrée');

                return $this->redirectToRoute('host_tables_show', [
                    'id' => $hostTable->getId(),
                    'nb_convives' => $nbConvives,
                ]);

            } else {

                // Si pas d'utilisateur connecté > redirection vers la page login

                $this->addFlash('notice' , 'Pour réserver, veuillez vous connecter');
                return $this->redirectToRoute('app_login');

            }

        } else {

            dump($bookingForm->createView());

        }

        $total = $hostTable->getMinPrice()*$nbConvives;

        // Récupération données du formulaire en GET depuis la requête

        $formData = $request->query->get('nb_convives');
        dump($formData);


        $suggest = $hostTablesRepository->findSuggest($hostTable);

        return $this->render(
            'host_tables/show.html.twig',
            [
                'host_table' => $hostTable,
                'hours' => $hours,
                'suggests' => $suggest,
                'bookingForm' => $bookingForm->createView(),
                'total' => $total
                ]
        );

        }


    /**
     * @Route("admin/tables/{id}/edit", name="host_tables_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, HostTables $hostTable): Response
    {
        $form = $this->createForm(HostTablesType::class, $hostTable);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('host_tables_index', [
                'id' => $hostTable->getId(),
            ]);
        }

        return $this->render('host_tables/edit.html.twig', [
            'host_table' => $hostTable,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("admin/tables/{id}", name="host_tables_delete", methods={"DELETE"})
     */
    public function delete(Request $request, HostTables $hostTable): Response
    {
        if ($this->isCsrfTokenValid('delete'.$hostTable->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($hostTable);
            $entityManager->flush();
        }

        return $this->redirectToRoute('host_tables_index');
    }


}
