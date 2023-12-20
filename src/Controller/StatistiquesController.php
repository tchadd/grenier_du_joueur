<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StatistiquesController extends AbstractController
{
    #[Route('/statistiques', name: 'app_statistiques')]
    public function index(): Response
    {
        return $this->render('statistiques/index.html.twig', [
            'controller_name' => 'StatistiquesController',
        ]);
    }
}
