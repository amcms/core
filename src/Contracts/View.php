<?php

namespace Amcms\Contracts;

interface View
{

    /**
     * Get the evaluated contents of the object.
     *
     * @return string
     */
    public function render();

    
    /**
     * Add a piece of data to the view.
     *
     * @param  string|array  $key
     * @param  mixed   $value
     * @return $this
     */
    public function with($key, $value = null);
}
