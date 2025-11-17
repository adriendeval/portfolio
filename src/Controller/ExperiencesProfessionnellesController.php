<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ExperiencesProfessionnellesController extends AbstractController
{
    #[Route('/experiences-professionnelles', name: 'app_experiences_professionnelles')]
    public function index(): Response
    {
        return $this->render('experiences_professionnelles/index.html.twig', [
            'controller_name' => 'ExperiencesProfessionnellesController',
        ]);
    }
}
