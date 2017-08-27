<?php

namespace Amcms\Core;
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
        //
    }
}
