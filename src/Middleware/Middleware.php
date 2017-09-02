<?php

namespace Amcms\Middleware;

class Middleware
{
    protected $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function __get($service)
    {
        if ($this->container->$service) {
            return $this->container->$service;
        }
    }
}