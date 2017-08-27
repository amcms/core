<?php

namespace Amcms\Controllers;
use Amcms\Contracts\Controller as ControllerContract;


class Controller implements ControllerContract
{
    public $container;

    public $logger;

    public function __construct($container)
    {
        $this->container = $container;
        $this->logger = $container['logger'];
    }

    public function boo($key, $value = NULL)
    {
        //
    }

    public function run()
    {
        // $this->logger->addInfo('Controller ' . __CLASS__ . ' run');
        return __CLASS__;
    }
}