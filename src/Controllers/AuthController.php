<?php

namespace Amcms\Controllers;


class AuthController extends Controller
{
    public function getSignup($request, $response)
    {
        // twig response
        // dd($request->getUri()->getPath());
        return $this->twig->render($response, 'auth/signup.twig');

        // php render
        // return $this->php->render($response, 'auth/signup.inc', 
        //     [
        //         'title' => 'Php view test',
        //         'content' => 'Hi, I`m php view!',
        //     ]);
    }

    public function postSignup($request, $response)
    {
        $data = $request->getParsedBody();
        $data = $request->getParam('name');
        dd($data);
    }
}