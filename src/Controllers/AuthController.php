<?php

namespace Amcms\Controllers;


class AuthController extends Controller
{
    public function getSignup($request, $response)
    {
        // twig response
        // dd($request->getUri()->getBasePath());
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
        //
    }
}