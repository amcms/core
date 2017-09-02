<?php

namespace Amcms\Contracts;

use Slim\Http\Request as Request;

interface Validator
{

    /**
     * Validate the request
     *
     * @param  string|array  $key
     * @param  mixed   $value
     * @return $this
     */
    public function check(Request $request, $rules = []);
}
