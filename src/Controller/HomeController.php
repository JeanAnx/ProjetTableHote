<?php

namespace App\Controller;

use App\Form\HostTablesSearchType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\FormType;


class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function homeSearch(Request $request)
    {

       $searchForm = $this->createForm(HostTablesSearchType::class , array());

       $searchForm->handleRequest($request);

        if ($searchForm->isSubmitted() && $searchForm->isValid()) {
            $data = $searchForm->getData();
            return $this->redirectToRoute('host_tables_index');
        } else {

            return $this->render('home/index.html.twig', [
                'searchForm' => $searchForm->createView(),
            ]);


        }

    }
}
