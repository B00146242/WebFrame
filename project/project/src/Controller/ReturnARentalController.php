<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReturnARentalController extends AbstractController
{
    #[Route('/return/a/rental', name: 'app_return_a_rental')]
    public function index(): Response
    {
        return $this->render('return_a_rental/index.html.twig', [
            'controller_name' => 'ReturnARentalController',
        ]);
    }
}
