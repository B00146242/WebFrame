<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReceptionistController extends AbstractController
{
    #[Route('/receptionist', name: 'app_receptionist')]
    public function index(): Response
    {
        return $this->render('receptionist/index.html.twig', [
            'controller_name' => 'ReceptionistController',
        ]);
    }
    #[Route('/receptionist/viewOder', name: 'app_viewOrder')]
    public function viewOder(): Response
    {
        return $this->render('receptionist/viewOrder.html.twig', [
            'controller_name' => 'ReceptionistController',
        ]);
    }
}
