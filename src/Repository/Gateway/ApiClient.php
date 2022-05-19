<?php

namespace App\Repository\Gateway;

use App\Entity\Service;

class ApiClient
{
    /**
     * @var string
     */
    protected $serviceName;

    public function create(Service $service): self
    {
        $this->serviceName = $service->getName();

        return $this;
    }

    /**
     * Get the value of serviceName.
     */
    public function getServiceName(): string
    {
        return $this->serviceName;
    }

    /**
     * Set the value of serviceName.
     */
    public function setServiceName(string $serviceName): self
    {
        $this->serviceName = $serviceName;

        return $this;
    }
}
