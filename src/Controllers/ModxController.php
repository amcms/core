<?php

namespace Amcms\Controllers;

use Amcms\Oldapi\Parser;

class ModxController extends Controller
{
    protected $request;
    protected $response;


    /**
     * Main entry point
     * @return null|Response MODX parser result
     */
    public function execute($request, $response, $args)
    {
        $this->request = $request;
        $this->response = $response;
        
        $this->dispatchRoute();

        // пока нет БД и кода, всегда возвращаем null
        return null;
    }

    public function dispatchRoute()
    {
        //
    }

    public function fillDocumentObject()
    {
        //
    }
}