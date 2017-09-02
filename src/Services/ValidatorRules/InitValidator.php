<?php
namespace Amcms\Services\ValidatorRules;

use Respect\Validation\Rules\AbstractRule;

class InitValidator extends AbstractRule
{
    public function validate($input)
    {
        return true;
    }
}