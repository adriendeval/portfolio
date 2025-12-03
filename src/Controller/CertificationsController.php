<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CertificationsController extends AbstractController
{
    #[Route('/certifications', name: 'app_certifications')]
    public function index(): Response
    {
        return $this->render('certifications/index.html.twig', [
            'controller_name' => 'CertificationsController',
        ]);
    }
}
