<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClothingItemBookingController extends AbstractController
{
    #[Route('/clothing/item/buy', name: 'app_clothing_item_buy')]
    public function buy(): Response
    {
        $template = 'clothing_item_booking/buy.html.twig';
        $args = [];
        return $this->render($template, $args);
    }

    #[Route('/clothing/item/rent', name: 'app_clothing_item_rent')]
    public function rent(): Response
    {
        $template = 'clothing_item_booking/rent.html.twig';
        $args = [];
        return $this->render($template, $args);
    }
}
