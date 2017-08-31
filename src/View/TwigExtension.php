<?php

namespace Amcms\View;
use Slim\Views\TwigExtension as SlimTwigExtension;

class TwigExtension extends SlimTwigExtension
{
    private $container;

    public function __construct($container)
    {
        $this->container = $container;
        $this->router = $container['router'];
        $this->uri = $container['request']->getUri()->getBasePath();
    }

    public function getName()
    {
        return 'amcms';
    }

    public function getFunctions()
    {
        return [
            // this methods place in parent class
            new \Twig_SimpleFunction('path_for', array($this, 'pathFor')),
            new \Twig_SimpleFunction('is_current_path', array($this, 'isCurrentPath')),

            // own methods
            new \Twig_SimpleFunction('config', array($this, 'getConfigVar')),
            new \Twig_SimpleFunction('globalPh', array($this, 'getGlobalPh')),
        ];
    }

    public function getConfigVar($name, $default = '')
    {
        if (isset($this->container['settings'][$name])) {
            return $this->container['settings'][$name];
        }
        return $default;
    }

    /**
     * Parse global placeholder
     * 
     * @param string $ph 
     * @return mixed|null
     */
    public function getGlobalPh($ph)
    {
        return app('gphs')->get($ph);
    }
}
