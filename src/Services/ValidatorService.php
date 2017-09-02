<?php

namespace Amcms\Services;

use Amcms\Services\Service;
use Awurth\SlimValidation\Validator as Engine;


class ValidatorService extends Service
{
    protected $engine;

    public function __construct()
    {
        $this->engine = new Engine();
    }
}