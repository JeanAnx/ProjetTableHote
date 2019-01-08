<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DetailsController extends AbstractController
{
    /**
     * @Route("/details", name="details")
     */
    public function index()
    {
        return $this->render('details/index.html.twig', [
            'controller_name' => 'DetailsController',
        ]);
    }
}
