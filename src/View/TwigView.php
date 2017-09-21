<?php

namespace Amcms\View;

use Amcms\Contracts\View as ViewContract;
use Slim\Views\Twig as SlimTwig;
use Slim\Views\TwigExtension as SlimTwigExtension;

class TwigView extends SlimTwig implements ViewContract
{
    /**
     * Adds global variable to view
     * @param string $name
     * @param string $value
     * @param array  $options
     */
    public function setGlobal($name, $value, $options = []) {
        if (isset($options['namespace'])) {
            $this->getEnvironment()->addGlobal($options['namespace'], [$name => $value]);
        } else {
            $this->getEnvironment()->addGlobal($name, $value);
        }   
    }
}
