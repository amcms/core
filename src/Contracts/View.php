<?php

namespace Amcms\Contracts;
use Psr\Http\Message\ResponseInterface;

interface View
{

    /**
     * @param ResponseInterface $response
     * @param array             $viewParams
     * @param null              $data
     * @return ResponseInterface
     */
    public function render(ResponseInterface $response, $template, $viewParams=[]);

    
    /**
     * @param null  $data
     * @param array $viewParams
     * @return string
     */
    // public function toString($data=null, $viewParams=[]);
}
