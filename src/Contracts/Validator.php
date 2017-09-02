<?php

namespace Amcms\Contracts;

use Psr\Http\Message\RequestInterface;

interface Validator
{

    /**
     * Validate the request
     *
     * @param  string|array  $key
     * @param  mixed   $value
     * @return $this
     */
    public function validate(RequestInterface $request, $rules = []);
}
