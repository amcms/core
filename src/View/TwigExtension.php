<?php

namespace Amcms\View;

class TwigExtension extends \Twig_Extension
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
        ];
    }

    public function getConfigVar($name, $default = '')
    {
        if (isset($this->container['settings'][$name])) {
            return $this->container['settings'][$name];
        }
        return $default;
    }

    public function pathFor($name, $data = [], $queryParams = [], $appName = 'default')
    {
        return $this->router->pathFor($name, $data, $queryParams);
    }

    public function isCurrentPath($name)
    {
        return $this->router->pathFor($name) === $this->uri->getPath();
    }
}
