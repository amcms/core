<?php

namespace Amcms\Controllers;
use Amcms\Contracts\Controller\Controller as ControllerContract;


class Controller implements ControllerContract
{
    public function __construct()
    {
        //
    }

    public function boo($key, $value = NULL)
    {
        //
    }

    public function run()
    {
        return __CLASS__;
    }
}