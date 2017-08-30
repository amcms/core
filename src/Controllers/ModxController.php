<?php

namespace Amcms\Controllers;

use Amcms\Oldapi\Parser;

class ModxController extends Controller
{
    protected $request;
    protected $response;

    public $resourceId;
    public $documentObject;


    /**
     * Main entry point
     * @return null|Response MODX parser result
     */
    public function execute($request, $response, $args)
    {
        $this->request = $request;
        $this->response = $response;
        // dd($request);
        
        // dd($this->modx->db);
        
        // URL to resource ID
        $this->resourceId = $this->dispatchRoute();
        if (!$this->resourceId) {
            return null;
        }

        // пока нет БД и кода, всегда возвращаем null
        return null;
    }

    /**
     * Get resource ID from request URI
     * @return integer|null 
     */
    public function dispatchRoute()
    {
        $requestedUri = $this->request->getUri()->getPath();
        // dd($requestedUri);
        // ...
        // return $id;
        return null;
    }

    public function fillDocumentObject()
    {
        //
    }
}