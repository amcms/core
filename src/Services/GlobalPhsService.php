<?php

namespace Amcms\Services;

use Amcms\Services\Service;


class GlobalPhsService extends Service
{
    protected $phs = [];

    /**
     * Add/write global placeholder
     * 
     * @param string $ph 
     * @param mixed $value 
     * @return null
     */
    public function set($ph, $value, $namespace = null)
    {
        if ($namespace) {
            $this->phs[$namespace][$ph] = $value;
        } else {
            $this->phs[$ph] = $value;
        }

        $this->setTwigGlobal($ph, $value, $namespace);        
    }

    /**
     * Add/write global twig placeholder
     * @param type $ph 
     * @param type $value 
     * @param type|null $namespace 
     * @return type
     */
    public function setTwigGlobal($ph, $value, $namespace = null)
    {
        if ($namespace) {
            $this->twig->getEnvironment()->addGlobal($namespace, [$ph => $value]);
        } else {
            $this->twig->getEnvironment()->addGlobal($ph, $value);
        }        
    }

    /**
     * Get global placeholder
     * 
     * @param string $ph 
     * @return mixed|null 
     */
    public function get($ph)
    {
        if (isset($this->phs[$ph])) {
            return $this->phs[$ph];
        }
        
        return null;
    }

}