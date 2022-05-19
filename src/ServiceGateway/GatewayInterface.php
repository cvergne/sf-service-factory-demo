<?php

namespace App\ServiceGateway;

use App\Entity\Service;
use Symfony\Component\HttpFoundation\Response;

interface GatewayInterface
{
    public function init(Service $service): self;

    public function process(string $action): Response;

    public static function getName(): string;
}
