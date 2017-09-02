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