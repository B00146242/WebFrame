<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ViewPurchaseHistoryController extends AbstractController
{
    #[Route('/view/purchase/history', name: 'app_view_purchase_history')]
    public function index(): Response
    {
        $template = 'view_purchase_history/index.html.twig';
        $args = [];
        return $this->render($template, $args);
    }

    #[Route('/refund/create', name: 'app_create_refund')]
    public function createRefund(Request $request): Response
    {
        $template = 'view_purchase_history/createRefund.html.twig';
        $args = [];
        return $this->render($template, $args);
    }
}
