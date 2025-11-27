<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class VeilleInformatiqueController extends AbstractController
{
    #[Route('/veille-informatique', name: 'app_veille_informatique')]
    public function index(): Response
    {
        return $this->render('veille_informatique/index.html.twig', [
            'controller_name' => 'VeilleInformatiqueController',
        ]);
    }
}
