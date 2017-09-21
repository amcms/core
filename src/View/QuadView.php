<?php

namespace Amcms\View;

use Amcms\Contracts\View as ViewContract;
use Amcms\Quad\Quad;
use Psr\Http\Message\ResponseInterface;

class QuadView extends Quad implements ViewContract
{
    /**
     * @param ResponseInterface $response
     * @param array             $viewParams
     * @param null              $data
     * @return ResponseInterface
     */
    public function render(ResponseInterface $response, $template, $viewParams=[]) {
        $out = $this->renderTemplate($template, $viewParams);
        $response->getBody()->write($out);
        return $response;
    }

    /**
     * Adds global variable to view
     * @param string $name
     * @param string $value
     * @param array  $options
     */
    public function setGlobal($name, $value, $options = []) {
        $this->setPlaceholder($name, $value);
    }
}
