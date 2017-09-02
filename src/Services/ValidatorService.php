<?php

namespace Amcms\Services;

use Slim\Http\Request as Request;
use Amcms\Services\Service;
use Awurth\SlimValidation\Validator as Engine;
use Respect\Validation\Validator as v;

class ValidatorService extends Service
{
    protected $engine;

    public function __construct()
    {
        $this->engine = new Engine();
    }

    /**
     * Validator wrapper
     * @param  RequestInterface $request 
     * @param  array            $rules   
     * @return mixed                    
     */
    public function check(Request $request, $rules = [])
    {
        foreach ($rules as $param => $rule) {
            if (is_array($rule)) {
                list($rule, $message) = $rule;
            }

            if (is_callable($rule)) {
                /**
                 * @todo check this possibility
                 */
                $validateAr[$param] = call_user_func($rule)
                                            ->setName('"' . ucfirst($param) . '"');
            } else {
                $ruleAr = explode(',', $rule);
                $validateAr[$param] = $this->setRules($ruleAr)
                                            ->setName('"' . ucfirst($param) . '"');
            }

            if ($message) {
                $validateAr[$param] = ['rules' => $validateAr[$param], 'message' => $message];
            }
            
        }

        if (is_array($validateAr)) {
            $this->engine->validate($request, $validateAr);

            if ($this->engine->isValid()) {
                dd('valid');
            } else {
                $errors = $this->engine->getErrors();
                dd($errors);
            }
        }
    }

    protected function setRules($ruleAr)
    {
        v::with('Amcms\\Services\\ValidatorRules\\');
        $vObj = v::initValidator();

        if (!is_array($ruleAr)) {
            return $vObj;
        }

        foreach ($ruleAr as $ruleStr) {
            $data = explode(':', trim($ruleStr));
            switch ($data[0]) {
                case 'required':
                    $vObj->notEmpty();
                    break;

                case 'email':
                    $vObj->email();
                    break;

                default:
                    break;
            }
        }

        return $vObj;
    }
}