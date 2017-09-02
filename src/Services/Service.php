<?php

namespace Amcms\Services;

use Amcms\Contracts\Service as ServiceContract;


class Service implements ServiceContract
{
    protected $container;

    // protected $logger;

    // protected $view;

    public function __construct($container)
    {
        $this->container = $container;
        // $this->logger = $container['logger'];
    }

    public function __get($service)
    {
        if ($this->container->$service) {
            return $this->container->$service;
        }
    }

    // public function boo($key, $value = NULL)
    // {
    //     //
    // }
}