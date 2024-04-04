<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function index(): Response
    {
        $template = 'default/index.html.twig';
        $args = [];
        return $this->render($template, $args);
    }

    #[Route('/autumn', name: 'autumn')]
    public function autumn(): Response
    {
        $template = 'default/autumn.html.twig';
        $args = [];
        return $this->render($template, $args);
    }

    #[Route('/threes/{n}', name: 'threes')]
    public function threes(int $n): Response
    {
        $message = $n . ' is NOT a multiple of 3';
        if(0 == $n % 3){
            $message = $n . ' is a multiple of 3';
        }

        $template = 'default/threes.html.twig';
        $args = [
            'message' => $message
        ];
        return $this->render($template, $args);
    }
}
