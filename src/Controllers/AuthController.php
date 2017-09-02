<?php

namespace Amcms\Controllers;

use Respect\Validation\Validator as v;
use Respect\Validation\Exceptions\NestedValidationException as vE;

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
        // $this->db->table('users')->insert(['name' => 'test', 'email' => 'test1@test.com', 'password' => '123']);
        
        $this->validator->check($request, [
                'name' => ['required', 'Name is require'],
                'email' => ['email', ],
                'password' => [function() { return v::notEmpty(); }, 'Password is require'],
            ]);

        if ($validator->isValid()) {
            dd('valid');
        } else {
            $errors = $validator->getErrors();
            dd($errors);
        }
        
        $data = $request->getParsedBody();
        $data = $request->getParam('name');
        dd($data);
    }
}