<?php

namespace Tests\Unit\Validator;

use Bitween\StructuredProgramming\Validator\SymfonyValidator;
use Bitween\StructuredProgramming\Validator\Validator;
use Symfony\Component\Validator\Validation;

class SymfonyValidatorCest extends ValidatorCest
{
    protected function getValidator(): Validator
    {
        $decorated = Validation::createValidator();

        return new SymfonyValidator($decorated);
    }
}
