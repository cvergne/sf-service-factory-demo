<?php

namespace App\Entity;

class Service
{
    protected $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * Get the value of name.
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name.
     *
     * @param mixed $name
     */
    public function setName($name): self
    {
        $this->name = $name;

        return $this;
    }
}
