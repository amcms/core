<?php

namespace Amcms\Contracts\Controller;

interface Controller
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
