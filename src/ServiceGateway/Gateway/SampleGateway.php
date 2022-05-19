<?php

namespace App\ServiceGateway\Gateway;

use App\Entity\Service;
use App\Repository\Gateway\ApiClient;
use App\ServiceGateway\GatewayInterface;
use Symfony\Component\HttpFoundation\Response;

class SampleGateway implements GatewayInterface
{
    /**
     * @var Service
     */
    protected $service;

    /**
     * @var ApiClient
     */
    protected $client;

    public function __construct(ApiClient $client)
    {
        $this->client = $client;
    }

    public function init(Service $service): self
    {
        $this->service = $service;
        $this->client->create($this->service);

        return $this;
    }

    public static function getName(): string
    {
        return 'sample';
    }

    public function process(string $action): Response
    {
        return new Response($this->client->getServiceName().' : '.$action);
    }

    /**
     * Get the value of service.
     */
    public function getService(): Service
    {
        return $this->service;
    }

    /**
     * Set the value of service.
     */
    public function setService(Service $service): self
    {
        $this->service = $service;

        return $this;
    }

    /**
     * Get the value of client.
     */
    public function getClient(): ApiClient
    {
        return $this->client;
    }

    /**
     * Set the value of client.
     */
    public function setClient(ApiClient $client): self
    {
        $this->client = $client;

        return $this;
    }
}
