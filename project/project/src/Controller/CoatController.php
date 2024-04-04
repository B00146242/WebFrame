<?php

namespace App\Controller;

use App\Util\Coat;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CoatController extends AbstractController
{
    #[Route('/coat', name: 'app_coat')]
    public function index(): Response
    {
        $coats = [];
        $c1 = new Coat();
        $c1->setDescription('hooded');
        $c1->setPrice(39.99);
        $coats[] = $c1;

        $c2 = new Coat();
        $c2->setDescription('lightweight');
        $c2->setPrice(19.99);
        $coats[] = $c2;

        $c3 = new Coat();
        $c3->setDescription('waterproof');
        $c3->setPrice(110.00);
        $coats[] = $c3;

        $template = 'coat/index.html.twig';
        $args = [
            'coats' => $coats
        ];
        return $this->render($template, $args);
    }
}
