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
     * @Route("/", name="home" , methods={"GET" , "POST"})
     */
    public function homeSearch(Request $request)
    {
       $searchForm = $this->createForm(HostTablesSearchType::class);
       $searchForm->handleRequest($request);

        if ($searchForm->isSubmitted() && $searchForm->isValid()) {
            $data = $searchForm->getData();

            return $this->redirectToRoute('host_tables_index' , [
                'data' => $data,
            ]);

        } else {

            dump($searchForm->createView());
            return $this->render('home/index.html.twig', [
                'searchForm' => $searchForm->createView(),
            ]);
        }

    }
}
