<?php

namespace Amcms\Oldapi;

use Amcms\Oldapi\Dbapi;

/**
 * This class is wrapper for old MODX API methods
 * Этот класс не содержит логику парсинга modx шаблонов. 
 * Только переходные методы для удобного вызова в коде.
 */

class Parser
{
    /**
     * DI container
     */
    protected $container;

    /**
     * Old MODX-like object for db API access
     * @var Dbapi
     */
    public $db;

    /**
     * Placeholders
     */
    public $placeholders;

    public function __construct($contaner)
    {
        $this->container = $contaner;
        $this->db = new Dbapi($this);
    }

    public function parseChunk($chunk, $ph, $openTag = '[+', $closeTag = '+]')
    {
        print_r($chunk);
        return 'OK';
    }
}