<?php

namespace App\Controller;

use App\Entity\Purchase;
use App\Entity\Rent;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClothingItemBookingController extends AbstractController
{
    #[Route('/clothing/item/buy', name: 'app_clothing_item_buy')]
    public function buy(): Response
    {
        $purchase = new Purchase();
        $items = ['jeans' => 20,
            'jacket' => 30,
            'shirt' => 10,
        ];
        return $this->render('clothing_item_booking/buy.html.twig', [
            'items' => $items
        ]);
    }

    #[Route('/clothing/item/rent', name: 'app_clothing_item_rent')]
    public function rent(): Response
    {
        $rent = new Rent();
        $items = [
            'Jeans' => [
                '1 Month' => 40,
                '2 Months' => 70,
                '3 Months' => 90
            ],
            'Shirt' => [
                '1 Month' => 20,
                '2 Months' => 35,
                '3 Months' => 45
            ],
            'Jacket' => [
                '1 Month' => 60,
                '2 Months' => 100,
                '3 Months' => 130
            ]
        ];

        return $this->render('clothing_item_booking/rent.html.twig', [
            'items' => $items,
        ]);
    }

}
