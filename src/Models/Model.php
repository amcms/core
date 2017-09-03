<?php

namespace Amcms\Models;

use Amcms\Contracts\Model as ModelContract;
use Illuminate\Database\Eloquent\Model as LaravelModel;

class Model extends LaravelModel implements ModelContract
{
    // protected $container;

    // public function __construct($container)
    // {
    //     $this->container = $container;
    // }

    // public function __get($service)
    // {
    //     if ($this->container->$service) {
    //         return $this->container->$service;
    //     }
    // }
}