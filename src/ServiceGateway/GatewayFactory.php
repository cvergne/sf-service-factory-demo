<?php

namespace App\ServiceGateway;

use App\Entity\Service;
use Symfony\Component\HttpFoundation\RequestStack;

class GatewayFactory
{
    /**
     * @param GatewayInterface[] $gateways
     *
     * @return GatewayInterface
     */
    public function __invoke(
        iterable $gateways,
        RequestStack $requestStack
    ): GatewayInterface {
        $request = $requestStack->getCurrentRequest();
        $serviceName = $request->attributes->get('service');

        $gateways = $gateways instanceof \Traversable ? iterator_to_array($gateways) : $gateways;

        if (!isset($gateways[$serviceName])) {
            throw new \InvalidArgumentException(sprintf('Service "%s" not found', $serviceName));
        }

        $gateway = clone $gateways[$serviceName];

        // Configure
        $gateway->init((new Service('Sample Service')));

        return $gateway;
    }
}
