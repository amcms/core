<?php

namespace Amcms\Contracts;

interface Service
{

    /**
     * Tmp
     *
     * @param  string|array  $key
     * @param  mixed   $value
     * @return $this
     */
    public function boo($key, $value = null);
}
