<?php

namespace App\Controller;

use App\Entity\HostTables;
use App\Entity\Hours;
use App\Form\HostTablesType;
use App\Repository\HostTablesRepository;
use App\Repository\HoursRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tables")
 */
class HostTablesController extends AbstractController
{
    /**
     * @Route("/", name="host_tables_index", methods={"GET"})
     */
    public function index(HostTablesRepository $hostTablesRepository, Request $request): Response
    {
// Récupération données du formulaire en GET depuis la requête

        $searchData = $request->query->get('data');

        dump($searchData);

// Si une ville a été envoyée via le formulaire, on fait une recherche en base de données

        if (!empty($searchData['city'])) {

            return $this->render(
                'host_tables/index.html.twig',
                [
                    'host_tables' => $hostTablesRepository->findBy( [
                        'city' => $searchData['city']
                    ])
                ]);
        }

// Si aucun champ n'a été renseigné, on balance tous les restaurants

        return $this->render(
            'host_tables/index.html.twig',
            [
                'host_tables' => $hostTablesRepository->findAll()
            ]);
    }


    /**
     * @Route("/search", name="host_tables_search", methods={"GET","POST"})
     */

    public function search(HostTablesRepository $hostTablesRepository , Request $request)
    {
        return $this->render(
            'host_tables/index.html.twig',
            [
                'host_tables' => $hostTablesRepository->findAll()
            ]);
    }


    /**
     * @Route("/new", name="host_tables_new", methods={"GET","POST"})
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
     * @return \Symfony\Component\HttpFoundation\Response
     * @Route("/{id}", name="host_tables_show", methods={"GET"})
     */
    public function show(HostTables $hostTable, HoursRepository $hoursRepository)
    {
        $hours = $hoursRepository->findBy(
            ['hostTable' => $hostTable]
        );

        return $this->render(
            'host_tables/show.html.twig',
            [
                'host_table' => $hostTable,
                'hours' => $hours
                ]

        );
    }

    /**
     * @Route("/{id}/edit", name="host_tables_edit", methods={"GET","POST"})
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
     * @Route("/{id}", name="host_tables_delete", methods={"DELETE"})
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
