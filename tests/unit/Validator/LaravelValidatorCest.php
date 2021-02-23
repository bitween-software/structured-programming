<?php

namespace Tests\Unit\Validator;

use Bitween\StructuredProgramming\Validator\LaravelValidator;
use Bitween\StructuredProgramming\Validator\Validator;
use Illuminate\Translation\ArrayLoader;
use Illuminate\Translation\Translator;
use Illuminate\Validation\Factory;

class LaravelValidatorCest extends ValidatorCest
{
    protected function getValidator(): Validator
    {
        $factory = new Factory(new Translator(new ArrayLoader(), 'en_US'));

        return new LaravelValidator($factory);
    }
}
