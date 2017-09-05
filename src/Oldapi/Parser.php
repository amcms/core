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
        return $this->container->get('quad')->parseChunk($chunk, $ph);
    }

    public function parseTemplate($template, $ph)
    {
        if (strpos($template, '@') !== 0) {
            $template = $template . '.tpl';
        }
        
        return $this->container->get('quad')->renderTemplate($template, $ph);
    }

    /**
     * Parse global placegolders 
     * 
     * @param string $ph 
     * @return mixed|null
     */
    public function globalPh($ph)
    {
        return app('gphs')->get($ph);
    }
}