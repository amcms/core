<?php

namespace Amcms\View;

use Amcms\Contracts\View as ViewContract;
use Slim\Views\PhpRenderer as SlimPhpRenderer;

class PhpView extends SlimPhpRenderer implements ViewContract
{
    /**
     * Adds global variable to view
     * @param string $name
     * @param string $value
     * @param array  $options
     */
    public function setGlobal($name, $value, $options = []) {
        // do
    }
}
