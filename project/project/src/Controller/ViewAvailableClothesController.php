<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ViewAvailableClothesController extends AbstractController
{
    #[Route('/view/available/clothes', name: 'app_view_available_clothes')]
    public function index(): Response
    {
        return $this->render('view_available_clothes/index.html.twig', [
            'controller_name' => 'ViewAvailableClothesController',
        ]);
    }
}
