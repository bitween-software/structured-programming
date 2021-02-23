<?php

namespace Tests\Unit\Validator;

use Bitween\StructuredProgramming\Validator\CValidator;
use Bitween\StructuredProgramming\Validator\Validator;

class CValidatorCest extends ValidatorCest
{
    protected function getValidator(): Validator
    {
        return new CValidator();
    }
}
