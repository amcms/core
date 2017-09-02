<?php

namespace Amcms\Middleware;

use Amcms\Services\GlobalPhsService as GlobalPh;

class FormErrors extends Middleware
{
    /**
     * Example middleware invokable class
     *
     * @param  \Psr\Http\Message\ServerRequestInterface $request  PSR7 request
     * @param  \Psr\Http\Message\ResponseInterface      $response PSR7 response
     * @param  callable                                 $next     Next middleware
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function __invoke($request, $response, $next)
    {
        $data = $this->flash->getMessage('form.errors');

        if ($data && $data[0]) {
            $this->globalPhs->set('errors', $data);

            // пока не готов механизм подключения глобальных плейсхолдеров, устанавливаем для twig 
            // глобальные значения
            $this->twig->getEnvironment()->addGlobal('errors', $data[0]);
        }

        return $next($request, $response);
    }
}