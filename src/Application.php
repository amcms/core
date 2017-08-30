<?php

namespace Amcms;

use Slim\App;

class Application extends App
{
    /**
     * Create a new Application Instance
     */
    public function __construct($container = [])
    {
        parent::__construct($container);
        $this->registerBaseServices();
    }

    /**
     * Register some "internal" services
     * @return void
     */
    public function registerBaseServices()
    {
        //see https://github.com/slimphp/Slim/blob/3.x/Slim/DefaultServicesProvider.php
    }
}
