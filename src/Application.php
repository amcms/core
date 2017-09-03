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
        //see example https://github.com/slimphp/Slim/blob/3.x/Slim/DefaultServicesProvider.php
        $container = $this->getContainer();

        // wrapper for Request validation
        if (!isset($container['validator'])) {
            $container['validator'] = new \Amcms\Services\ValidatorService($container);
        }

        // Auth service
        if (!isset($container['auth'])) {
            $container['auth'] = new \Amcms\Services\AuthService($container);
        }

        // Twig View 
        if (!isset($container['twig'])) {
            $container['twig'] = function ($c) {
                $isDebug = $c['settings']['debug'] ?: false;
                $twigTemplatesPath = $c['path'] . '/' . (isset($c['settings']['templates']['twig']['template_path']) ? trim($c['settings']['templates']['twig']['template_path'], '/') : 'resources/views/templates');
                $twigCachePath = $c['path'] . '/' . (isset($c['settings']['templates']['twig']['cache_path']) ? trim($c['settings']['templates']['twig']['cache_path'], '/') : 'storage/cache');

                $view = new \Amcms\View\TwigView($twigTemplatesPath, [
                    'cache' => $twigCachePath,
                    'debug' => $isDebug,
                    // 'auto_update' => false,
                ]);

                $view->addExtension(new \Amcms\View\TwigExtension($c));

                return $view;
            };
        }
    }
}
