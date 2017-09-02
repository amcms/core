<?php

namespace Amcms\Controllers;

use Amcms\Contracts\Controller as ControllerContract;


class Controller implements ControllerContract
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

    public function run($request, $response, $args)
    {
        // $this->logger->addInfo('Controller ' . __CLASS__ . ' run');
        
        // здесь должен быть вызов парсера MODX, который вернет результат, либо null
        $modLogic = new ModxController($this->container);
        $result = $modLogic->execute($request, $response, $args);
        
        // если нет такого маршрута, пробуем подключить статический файл
        if (!$result && !empty($args['arg']) && file_exists(resource_path('views/raw/' . $args['arg']))) {
            return require resource_path('views/raw/' . $args['arg']);
        }

        // для отладки, чтобы не заблудиться
        return 'You ask for ' . $request->getUri()->getPath();//__CLASS__;

        // скорее всего, будет так
        // return $result;
    }
}
