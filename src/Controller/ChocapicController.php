<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ChocapicController extends AbstractController
{
    #[Route('/chocapic', name: 'app_chocapic')]
    public function index(): Response
    {
        return $this->render('chocapic/index.html.twig', [
            'controller_name' => 'ChocapicController',
        ]);
    }
}
