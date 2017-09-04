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
        echo $this->renderTemplate($template, $viewParams);
        return $response;
    }
}
