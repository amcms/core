<?php

namespace Amcms\Controllers;
use Amcms\Contracts\Controller as ControllerContract;


class Controller implements ControllerContract
{
    protected $container;

    protected $logger;

    // protected $view;

    public function __construct($container)
    {
        $this->container = $container;
        $this->logger = $container['logger'];
    }

    public function __get($service)
    {
        if ($this->container->$service) {
            return $this->container->$service;
        }
    }

    public function boo($key, $value = NULL)
    {
        //
    }

    public function run($request, $response, $args)
    {
        // $this->logger->addInfo('Controller ' . __CLASS__ . ' run');
        // var_dump($args);
        // print_r($request->getUri()->getPath());
        
        // если нет такого маршрута, пробуем подключить статический файл
        if (file_exists(resources_path('views/raw/' . $args['arg']))) {
            return require resources_path('views/raw/' . $args['arg']);
        }
        return '';//__CLASS__;
    }
}