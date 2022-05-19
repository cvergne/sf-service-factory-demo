<?php

namespace App\Controller;

use App\ServiceGateway\GatewayInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GatewayController extends AbstractController
{
    /**
     * @Route("/provider/{service}/{action}", name="provider_entry")
     */
    public function index(GatewayInterface $gateway, string $action): Response
    {
        return $gateway->process($action);
    }
}
