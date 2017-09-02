<?php

namespace Amcms\Services;

use Slim\Http\Request as Request;
use Amcms\Services\Service;
use Awurth\SlimValidation\Validator as Engine;
use Respect\Validation\Validator as v;

class ValidatorService extends Service
{
    protected $engine;

    public function __construct($container)
    {
        parent::__construct($container);
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
                unset($message);
            }
            
        }

        if (is_array($validateAr)) {
            $this->engine->validate($request, $validateAr);

            if ($this->failed()) {
                $this->flash->addMessage('form.old', $request->getParsedBody()); // or getParams()?
                $this->flash->addMessage('form.errors', $this->getErrors());
                return false;
            }
        }

        return true;
    }

    /**
     * Create rules chain
     * @param array $ruleAr string-based rules
     * @return  Respect\Validation\Validator 
     */
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

    /**
     * Wrapper for validate engine
     * @return mixed error array
     */
    public function getErrors()
    {
        return $this->engine->getErrors();
    }

    /**
     * Wrapper for validate engine
     * @return boolean 
     */
    public function failed()
    {
        return !$this->engine->isValid();
    }
}