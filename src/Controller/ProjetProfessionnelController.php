<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ProjetProfessionnelController extends AbstractController
{
    #[Route('/projet-professionnel', name: 'app_projet_professionnel')]
    public function index(): Response
    {
        return $this->render('projet_professionnel/index.html.twig', [
            'controller_name' => 'ProjetProfessionnelController',
        ]);
    }
}
